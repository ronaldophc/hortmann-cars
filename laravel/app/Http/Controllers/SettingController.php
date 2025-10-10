<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.settings', [
            'settings' => Setting::query()->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $request)
    {
        $setting = Setting::first();

        if ($request->hasFile('logo')) {
            $path = Storage::disk('cloudinary')->put('logo', $request->file('logo'));

            $setting->logo = $path;
        }

        if ($request->hasFile('logo_alt')) {
            $path = Storage::disk('cloudinary')->put('logo_alt', $request->file('logo_alt'));

            $setting->logo_alt = $path;
        }

        Setting::updateSettings($setting);
        return redirect()->route('admin.settings');
    }
}
