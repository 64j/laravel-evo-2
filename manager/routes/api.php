<?php

use Illuminate\Support\Facades\Route;
use Manager\Http\Controllers\BootstrapController;
use Manager\Http\Controllers\TemplateController;

Route::post('bootstrap', [BootstrapController::class, 'index']);

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
