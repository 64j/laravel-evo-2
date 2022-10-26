<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'web',
], function () {
    Route::get('/manager', 'Home@index')->middleware('auth')->name('home');
    Route::get('/manager/login', 'Auth@formLogin')->name('login');
    Route::post('/manager/login', 'Auth@login');
    Route::get('/manager/api')->middleware('guest');
});

Route::group([
    'middleware' => 'api',
], function () {
    Route::post('/manager/api', 'Controller@handle')->middleware('auth:api');
});
