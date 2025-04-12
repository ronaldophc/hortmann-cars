<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleStoreRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $query = Vehicle::query();

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
    
        if ($request->filled('sort')) {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            } 
            if ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }

        $vehicles = $query->paginate(5);

        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function show(Vehicle $vehicle)
    {
        return view('admin.vehicles.show', [
            'vehicle' => $vehicle,
        ]);
    }

    public function store(VehicleStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $vehicle = Vehicle::create($request->all());
            DB::commit();
            return redirect(route('admin.vehicles.show', $vehicle->id))
                ->with('success', 'Veículo cadastrado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro ao cadastrar veículo: ' . $e->getMessage());
            return back()
                ->withErrors(['error' => 'Erro ao cadastrar veículo.'])
                ->withInput();
        }
    }

    public function create()
    {
        return view('admin.vehicles.create');
    }
}
