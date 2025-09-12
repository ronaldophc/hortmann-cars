<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.settings', [
            'settings' => Setting::getSettings(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request)
    {
        Setting::updateSettings($request->validated());
        return redirect()->route('admin.settings');
    }
}
