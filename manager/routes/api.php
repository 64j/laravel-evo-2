<?php

use Illuminate\Support\Facades\Route;
use Manager\Http\Controllers\BootstrapController;
use Manager\Http\Controllers\CategoryController;
use Manager\Http\Controllers\TemplateController;
use Manager\Http\Controllers\TreeController;

Route::post('bootstrap', [BootstrapController::class, 'index']);

Route::group([
    'prefix' => 'category',
], fn() => [
    Route::get('templates', [CategoryController::class, 'templates']),
    Route::get('tvs', [CategoryController::class, 'tvs']),
    Route::get('chunks', [CategoryController::class, 'chunks']),
]);

Route::group([
    'prefix' => 'tree',
], fn() => [
    Route::get('/', [TreeController::class, 'get']),
]);

Route::apiResource('template', TemplateController::class);

//Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => []], function () {
//    // Permissions
//    Route::apiResource('permissions', 'PermissionsApiController');
//
//    // Roles
//    Route::apiResource('roles', 'RolesApiController');
//
//    // Users
//    Route::apiResource('users', 'UsersApiController');
//
//});
