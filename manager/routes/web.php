<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix(env('MGR_DIR'))->get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::get('/manager', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::view('/' . env('MGR_DIR') . '/{any}', 'dashboard')
    ->middleware('auth')
    ->where('any', '.*');

//Route::view('/manager/{any}', 'dashboard')
//    ->middleware('auth')
//    ->where('any', '.*');
