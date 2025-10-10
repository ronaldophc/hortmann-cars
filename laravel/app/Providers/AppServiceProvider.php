<?php

namespace App\Providers;

use App\Models\Settings\Customer;
use App\Services\DatabaseService;
use App\View\Composers\SettingsComposer;
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
        $partialsUrl = explode(':', $host);
        if($host == 'localhost:8080') {
            return;
        }

        $customer = Customer::query()
            ->where('domain', $baseUrl)
            ->first();
        if (!is_null($customer)) {
            session()->put('connection_name', optional($customer)->connection_name);
            config(['app.name' => $customer->name]);
            $databaseService = new DatabaseService($customer);
            $databaseService->addConnection()->setAsDefault();
        }

        View::composer('*', SettingsComposer::class);
    }
}
