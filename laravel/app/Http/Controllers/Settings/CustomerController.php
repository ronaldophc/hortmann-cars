<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Models\Settings\Customer;
use App\Models\Settings\SubDomain;
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

        foreach ($customers as $customer) {
            $databaseService = new DatabaseService($customer->connection_name);
            $customer->hasPendingMigrations = $databaseService->verifyMigrations();
        }

        return view('settings.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('settings.customers.create');
    }

    public function store(StoreCustomerRequest $request, Customer $customer)
    {
        try {
            DB::connection('settings')->getPdo();
            $data = $request->validated();

            $data['connection_name'] = Customer::generateConnectionName($data['name']);

            $customer = Customer::create($data);

            if (!empty($data['subdomains']))
            {
                foreach ($data['subdomains'] as $subdomain) {
                    $connectionName = SubDomain::generateConnectionName($data['connection_name'], $subdomain['name']);
                    $subdomain = $customer->subdomains()->create([
                        'name' => $subdomain['name'],
                        'active' => 1,
                        'subdomain' => $subdomain['value'],
                        'connection_name' => $connectionName,
                    ]);
                    DB::statement("CREATE DATABASE `{$subdomain->connection_name}`");
                }
            }

            DB::statement("CREATE DATABASE `{$customer->connection_name}`");
            return redirect()->route('settings.customers.index')->with('success', 'Empresa criada com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors([$e->getMessage()])->withInput();
        }
    }

    public function edit(Customer $customer)
    {
        return view('settings.customers.edit', compact('customer'));
    }

    public function migrate(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $databaseService = new DatabaseService($customer->connection_name);
        $databaseService->addConnection()->setAsDefault()->runMigrations();
        return back()->with('success', 'Migration e seeder executados!');
    }

    public function refresh(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $databaseService = new DatabaseService($customer->connection_name);
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
        $databaseService = new DatabaseService($customer->connection_name);
        $databaseService->addConnection()->setAsDefault()->runSeeders();
        return back()->with('success', 'Seeder executado!');
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'domain' => 'required|string|max:255|unique:settings.customers,domain,' . $customer->id,
        ]);

        $customer->update([
            'name' => $data['name'],
            'domain' => $data['domain'],
            'active' => $request->input('active', 1),
        ]);

        return redirect()->route('settings.customers.index')->with('success', 'Empresa atualizada com sucesso!');
    }

    public function destroy(Request $request, Customer $customer)
    {
        try {
            DB::beginTransaction();
            DB::connection('settings')->getPdo();

            $subdomains = $customer->subdomains();
            foreach ($subdomains as $subdomain) {
                DB::statement("DROP DATABASE IF EXISTS `{$subdomain->connection_name}`");
                $subdomain->delete();
            }

            DB::statement("DROP DATABASE IF EXISTS `{$customer->connection_name}`");
            $customer->delete();

            DB::commit();
            return redirect()->route('settings.customers.index')->with('success', 'Empresa deletada com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error deleting customer: " . $e->getMessage());
            return back()->withErrors(['error' => 'Erro ao deletar a empresa.'])->withInput();
        }
    }
}
