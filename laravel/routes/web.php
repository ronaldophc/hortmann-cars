<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return view('welcome');
})->name('public.home');

Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('admin.authenticate');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('admin.logout');

    Route::resource('vehicles', VehicleController::class)
        ->except(['edit'])
        ->names([
            'index' => 'admin.vehicles.index',
            'show' => 'admin.vehicles.show',
            'store' => 'admin.vehicles.store',
            'create' => 'admin.vehicles.create',
        ]);
});


