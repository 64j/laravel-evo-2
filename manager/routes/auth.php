<?php

use Illuminate\Support\Facades\Route;
use Manager\Http\Controllers\AuthController;

Route::middleware('guest')
    ->prefix(env('MGR_DIR'))
    ->group(fn() => [
        Route::view('login', 'login')->name('login'),
        Route::post('login', [AuthController::class, 'login']),
        Route::view('forgot', 'forgot')->name('forgot'),
        Route::post('forgot', [AuthController::class, 'forgot'])->name('password.reset'),
    ]);

Route::middleware('auth')
    ->prefix(env('MGR_DIR'))
    ->group(fn() => [
        Route::any('logout', [AuthController::class, 'logout'])->name('logout'),
    ]);
