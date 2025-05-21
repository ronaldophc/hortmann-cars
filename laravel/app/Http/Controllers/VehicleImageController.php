<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleStoreRequest;
use App\Http\Requests\VehicleUpdateRequest;
use App\Models\Image;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class VehicleImageController extends Controller
{
    public function update(Request $request, Image $image)
    {
        DB::beginTransaction();

        try {
            $vehicle = Vehicle::find($request->vehicle_id);
            $vehicle->images()->update(['is_main' => false]);
            $vehicle->images()->where('id', $image->id)->update(['is_main' => true]);
            DB::commit();
            return redirect()->back()->with('success', 'Imagem principal atualizada com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro ao atualizar imagem principal: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erro ao atualizar imagem principal.');
        }
    }

    public function destroy(Image $image)
    {
        DB::beginTransaction();

        try {
            $image->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Imagem excluída com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro ao excluir imagem: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erro ao excluir imagem.');
        }
    }
}
