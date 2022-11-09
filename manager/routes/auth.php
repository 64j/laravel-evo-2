<?php

use Illuminate\Support\Facades\Route;
use Manager\Http\Controllers\Auth\AuthenticatedSessionController;

Route::middleware('guest')
    ->prefix(env('MGR_DIR'))
    ->group(fn() => [
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login'),
        Route::post('login', [AuthenticatedSessionController::class, 'store']),
    ]);

Route::middleware('auth')
    ->prefix(env('MGR_DIR'))
    ->group(fn() => [
        Route::any('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout'),
    ]);
