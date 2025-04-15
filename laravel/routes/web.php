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
    Route::get('/', [VehicleController::class, 'index'])->name('admin.dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('admin.logout');

    Route::resource('vehicles', VehicleController::class)
        ->names([
            'index' => 'admin.vehicles.index',
            'show' => 'admin.vehicles.show',
            'store' => 'admin.vehicles.store',
            'create' => 'admin.vehicles.create',
            'edit' => 'admin.vehicles.edit',
            'update' => 'admin.vehicles.update',
            'destroy' => 'admin.vehicles.destroy',
        ]);
});


