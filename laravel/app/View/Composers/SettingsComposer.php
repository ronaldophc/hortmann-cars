<?php

namespace App\View\Composers;

use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SettingsComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        if (app()->runningInConsole()) {
            $view->with('settings', Setting::query()->first());
            return;
        }

        $settings = Cache::remember('settings:first', 60, fn() => Setting::query()->first());

        $logoUrl = null;
        if ($settings && !empty($settings->logo)) {
            $logoUrl = Cache::remember('logo_url', 60 * 24, function () use ($settings) {
                try {
                    return Storage::disk('cloudinary')->url($settings->logo);
                } catch (\Throwable $e) {
                    return null;
                }
            });
        }

        $connectionName = session('connection_name');

        $customCssExists = false;
        if (!empty($connectionName)) {
            $cssCacheKey = 'custom_css_exists:' . $connectionName;
            $customCssExists = Cache::remember($cssCacheKey, 60, fn() => file_exists(resource_path("css/{$connectionName}.css")));
        }

        $view->with([
            'settings' => $settings,
            'logoUrl' => $logoUrl,
            'connection_name' => $connectionName,
            'customCssExists' => $customCssExists,
        ]);
    }
}
