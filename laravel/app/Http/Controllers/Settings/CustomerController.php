<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\Customer;
use App\Services\DatabaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $migrator = app('migrator');
        $migrationFiles = collect($migrator->getMigrationFiles([database_path('migrations')]))
            ->map(fn($path) => pathinfo($path, PATHINFO_FILENAME));

        foreach ($customers as $customer) {
            $databaseService = new DatabaseService($customer);
            $databaseService->addConnection();
            $customer->active = $customer->active ? 'Ativo' : 'Desativado';

            if (!Schema::connection($customer->name)->hasTable('migrations')) {
                $customer->hasPendingMigrations = true;
                continue;
            }

            $ranMigrations = DB::connection($customer->name)
                ->table('migrations')
                ->pluck('migration');
            $pending = $migrationFiles->diff($ranMigrations);
            $customer->hasPendingMigrations = $pending->isNotEmpty();
        }
        return view('settings.index', compact('customers'));
    }

    public function create()
    {
        return view('settings.create');
    }

    public function edit(Customer $customer)
    {
        return view('settings.edit', compact('customer'));
    }

    public function migrate(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $databaseService = new DatabaseService($customer);
        $databaseService->addConnection()->setAsDefault()->runMigrations();
        return back()->with('success', 'Migration e seeder executados!');
    }

    public function refresh(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $databaseService = new DatabaseService($customer);
        $databaseService->addConnection()->setAsDefault()->refreshDatabase();
        return back()->with('success', 'Migration e seeder executados!');
    }

    public function refreshSettings()
    {
        Artisan::call('migrate:refresh', [
            '--path' => 'database/migrations/settings',
            '--database' => 'settings',
        ]);
        return back()->with('success', 'Migration e seeder executados!');
    }

    public function seed(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $databaseService = new DatabaseService($customer);
        $databaseService->addConnection()->setAsDefault()->runSeeders();
        return back()->with('success', 'Seeder executado!');
    }

    public function store(Request $request, Customer $customer)
    {
        try {
            DB::beginTransaction();
            DB::connection('settings')->getPdo();
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'domain' => 'required|string|max:255|unique:settings.customers,domain',
                'subdomains' => 'array',
                'subdomains.*' => 'nullable|string|max:255|distinct',
            ]);

            $name = Str::slug($data['name'], '_');
            $connectionName = preg_replace('/[^a-z0-9_]/', '', strtolower($name));

            $customer = Customer::create([
                'name' => $data['name'],
                'domain' => $data['domain'],
                'active' => $request->input('active', 1),
                'connection_name' => $connectionName,
            ]);

            foreach (array_filter($data['subdomains'] ?? []) as $subdomain) {
                $subdomainName = Str::slug($subdomain, '_');
                $connectionName = $customer->connection_name . '_' . preg_replace('/[^a-z0-9_]/', '', strtolower($subdomainName));
                $customer->subdomains()->create([
                    'name' => $subdomain,
                    'active' => 1,
                    'subdomain' => $subdomain,
                    'connection_name' => $connectionName,
                ]);
            }

            DB::statement("CREATE DATABASE `{$data['name']}`");
            $databaseService = new DatabaseService($customer);
            $databaseService->addConnection()->setAsDefault()->configureDatabase();
            DB::commit();
            return redirect()->route('settings.customers.index')->with('success', 'Empresa criada com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors([$e->getMessage()])->withInput();
        }

    }
}
