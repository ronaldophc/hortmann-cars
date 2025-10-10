<?php

use App\Http\Controllers\Settings\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SettingsAuthenticated;
use App\Http\Middleware\SettingsNotAuthenticated;
use App\Http\Controllers\Settings\CustomerController;

Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware(SettingsAuthenticated::class);

Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::middleware([SettingsNotAuthenticated::class])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', function () {
        return redirect()->route('settings.customers.index');
    })->name('home');
    Route::resource('customers', CustomerController::class);
    Route::resource('subdomains', CustomerController::class);
    Route::post('customers/{id}/migrate', [CustomerController::class, 'migrate'])->name('customers.migrate');
    Route::post('customers/{id}/refresh', [CustomerController::class, 'refresh'])->name('customers.refresh');
    Route::post('customers/{id}/seed', [CustomerController::class, 'seed'])->name('customers.seed');

    Route::get('settings/refresh', [CustomerController::class, 'refreshSettings'])->name('settings.refresh');
});
