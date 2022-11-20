<?php

use Illuminate\Support\Facades\Route;
use Manager\Http\Controllers\BootstrapController;
use Manager\Http\Controllers\CategoryListController;
use Manager\Http\Controllers\ChunkController;
use Manager\Http\Controllers\ModuleController;
use Manager\Http\Controllers\PluginController;
use Manager\Http\Controllers\SnippetController;
use Manager\Http\Controllers\TemplateController;
use Manager\Http\Controllers\TreeController;
use Manager\Http\Controllers\TvController;

Route::post('bootstrap', [BootstrapController::class, 'index']);

Route::group([
    'prefix' => 'tree',
], fn() => [
    Route::get('/', [TreeController::class, 'get']),
]);

Route::apiResource('template', TemplateController::class);
Route::apiResource('tv', TvController::class);
Route::get('tvs/sort', [TvController::class, 'sort']);
Route::post('tvs/sort', [TvController::class, 'sort']);
Route::apiResource('chunk', ChunkController::class);
Route::apiResource('snippet', SnippetController::class);
Route::apiResource('plugin', PluginController::class);
Route::get('plugins/sort', [PluginController::class, 'sort']);
Route::post('plugins/sort', [PluginController::class, 'sort']);
Route::apiResource('module', ModuleController::class);
//Route::apiResource('category', CategoryController::class);
Route::apiResource('category/list', CategoryListController::class);

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
