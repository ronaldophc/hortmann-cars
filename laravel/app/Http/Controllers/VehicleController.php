<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleStoreRequest;
use App\Http\Requests\VehicleUpdateRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $query = Vehicle::query();
        $user = Auth::user();
        $query->where('user_id', $user->id);
        
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
        $user = Auth::user();

        try {
            $data = $request->validated();
            $data['user_id'] = $user->id;

            $vehicle = Vehicle::create($data);
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

    public function edit(Vehicle $vehicle)
    {
        return view('admin.vehicles.edit', [
            'vehicle' => $vehicle,
        ]);
    }

    public function update(VehicleUpdateRequest $request, Vehicle $vehicle)
    {
        DB::beginTransaction();

        try {
            $vehicle->update($request->validated());
            DB::commit();
            return redirect(route('admin.vehicles.edit', $vehicle->id))
                ->with('success', 'Veículo atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro ao atualizar veículo: ' . $e->getMessage());
            return back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
    }

    public function destroy(Vehicle $vehicle)
    {
        DB::beginTransaction();

        try {
            $vehicle->delete();
            DB::commit();
            return redirect(route('admin.vehicles.index'))
                ->with('success', 'Veículo excluído com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro ao excluir veículo: ' . $e->getMessage());
            return back()
                ->with('error', $e->getMessage());
        }
    }
}
