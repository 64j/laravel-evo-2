<?php

use Illuminate\Support\Facades\Route;

Route::get('/manager', 'HomeController@index')->middleware(['auth']);
Route::get('/manager/login', 'AuthController@formLogin')->name('login');
Route::post('/manager/login', 'AuthController@login');
