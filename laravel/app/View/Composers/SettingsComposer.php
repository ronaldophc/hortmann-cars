<?php

namespace App\View\Composers;

use App\Models\Setting;
use Illuminate\View\View;

class SettingsComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('settings', Setting::query()->first());
    }
}
