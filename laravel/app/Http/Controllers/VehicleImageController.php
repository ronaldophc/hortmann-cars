<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Image;
use App\Models\Vehicle;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            Storage::disk('cloudinary')->delete($image->path);
            DB::commit();
            return redirect()->back()->with('success', 'Imagem excluída com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro ao excluir imagem: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erro ao excluir imagem.');
        }
    }

    public function store(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        DB::beginTransaction();

        try {
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $imageFile) {
                    $path = Storage::disk('cloudinary')->put('vehicles', $imageFile);
                    $vehicle->images()->create([
                        'path' => $path,
                        'is_main' => false,
                    ]);
                }
            }
            DB::commit();
            return redirect()->back()->with('success', 'Imagens adicionadas com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro ao adicionar imagens: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erro ao adicionar imagens.');
        }
    }
}
