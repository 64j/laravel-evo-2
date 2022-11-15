<?php

use Illuminate\Support\Facades\Route;
use Manager\Http\Controllers\AuthController;

Route::prefix(env('MGR_DIR'))->group(fn() => [
    Route::middleware('guest')
        ->group(fn() => [
            Route::view('login', 'login')->name('login'),
            Route::post('login', [AuthController::class, 'login']),
            Route::view('forgot', 'forgot')->name('forgot'),
            Route::post('forgot', [AuthController::class, 'forgot'])->name('password.reset'),
        ]),

    Route::any('logout', [AuthController::class, 'logout'])
        ->middleware('auth')
        ->name('logout'),

    Route::view('/', 'dashboard')
        ->middleware('auth')
        ->name('dashboard'),

    Route::view('/{any}', 'dashboard')
        ->middleware('auth')
        ->where('any', '.*'),
]);
