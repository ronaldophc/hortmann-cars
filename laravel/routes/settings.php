<?php

use App\Http\Controllers\Settings\Auth\LoginController;

\Illuminate\Support\Facades\Route::get('/', [LoginController::class, 'index'])
    ->name('home');
