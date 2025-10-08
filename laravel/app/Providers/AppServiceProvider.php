<?php

namespace App\Providers;

use App\Models\Settings\Customer;
use App\Services\DatabaseService;
use App\View\Composers\SettingsComposer;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        $baseUrl = URL::to('/');
        $host = request()->getHttpHost();
        $partialsUrl = explode('.', $host);

        $customer = Customer::query()
            ->where('domain', $baseUrl)
            ->first();
        if (!is_null($customer)) {
            session()->put('customer_id', optional($customer)->id);
            config(['app.name' => $customer->name]);
            $databaseService = new DatabaseService($customer);
            $databaseService->addConnection()->setAsDefault();
        }

        View::composer('*', SettingsComposer::class);
    }
}
