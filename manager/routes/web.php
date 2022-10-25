<?php

use Illuminate\Support\Facades\Route;

Route::get('/manager', 'HomeController@index')->middleware(['auth']);
Route::get('/login', 'AuthController@formLogin')->name('login');
Route::post('/login', 'AuthController@login');
Route::get('/manager/login', 'AuthController@formLogin');
Route::post('/manager/login', 'AuthController@login');
