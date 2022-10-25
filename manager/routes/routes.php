<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'web',
    'namespace' => '\\Manager\\Http\\Controllers'
], function () {
    Route::get('/manager', 'Home@index')->middleware('auth');
    Route::get('/manager/login', 'Auth@formLogin')->name('login');
    Route::post('/manager/login', 'Auth@login');
});

Route::group([
    'middleware' => 'api',
    'namespace' => '\\Manager\\Http\\Controllers'
], function () {
    Route::get('/manager/api', 'Controller@handle')->middleware('guest');
    Route::post('/manager/api', 'Controller@handle')->middleware('auth:api');
});
