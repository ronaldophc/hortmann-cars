<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\Customer;
use App\Services\DatabaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
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
        $databaseService->addConnection()->setAsDefault();
        $databaseService->configureDatabase();
        return back()->with('success', 'Migration e seeder executados!');
    }

    public function store(Request $request, Customer $customer)
    {
        try {
            DB::connection('settings')->getPdo();
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'domain' => 'required|string|max:255|unique:settings.customers,domain',
                'subdomain' => 'max:255|unique:settings.customers,subdomain',
            ]);

            $customer->fill($data);
            $customer->save();
            DB::statement("CREATE DATABASE `$data[name]`");

            DB::commit();
            return redirect()->route('settings.customers.index')->with('success', 'Empresa criada com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors([$e->getMessage()])->withInput();
        }

    }
}
