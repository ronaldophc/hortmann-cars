<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Cache;
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
        $oldLogo = $setting->logo ?? null;

        if ($request->hasFile('logo')) {
            $path = Storage::disk('cloudinary')->put('logo', $request->file('logo'));

            $setting->logo = $path;
        }

        Setting::updateSettings($setting);
        Cache::forget('settings:first');
        Cache::forget('logo_url');
        return redirect()->route('admin.settings');
    }
}
