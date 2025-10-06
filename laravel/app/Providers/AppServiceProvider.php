<?php

namespace App\Providers;

use App\View\Composers\SettingsComposer;
use Illuminate\Support\Facades\Artisan;
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
        Log::info('Base URL: ' . $baseUrl);

        $connectionName = 'laravel3';

        Config::set("database.connections.{$connectionName}", array(
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => 'database',
            'port' => '3306',
            'database' => $connectionName,
            'username' => 'root',
            'password' => 'secret',
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                \PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ));

        Config::set('database.default', $connectionName);




        View::composer('*', SettingsComposer::class);
    }
}
