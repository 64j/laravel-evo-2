<?php

use Illuminate\Support\Facades\Route;
use Manager\Http\Controllers\BootstrapController;
use Manager\Http\Controllers\CategoryController;
use Manager\Http\Controllers\ChunkController;
use Manager\Http\Controllers\ModuleController;
use Manager\Http\Controllers\PluginController;
use Manager\Http\Controllers\SnippetController;
use Manager\Http\Controllers\TemplateController;
use Manager\Http\Controllers\TreeController;
use Manager\Http\Controllers\TvController;

Route::post('bootstrap', [BootstrapController::class, 'index']);

Route::group([
    'prefix' => 'category',
], fn() => [
    Route::get('templates', [CategoryController::class, 'templates']),
    Route::get('tvs', [CategoryController::class, 'tvs']),
    Route::get('chunks', [CategoryController::class, 'chunks']),
    Route::get('snippets', [CategoryController::class, 'snippets']),
    Route::get('plugins', [CategoryController::class, 'plugins']),
    Route::get('modules', [CategoryController::class, 'modules']),
]);

Route::group([
    'prefix' => 'tree',
], fn() => [
    Route::get('/', [TreeController::class, 'get']),
]);

Route::apiResource('template', TemplateController::class);
Route::apiResource('tvs', TvController::class);
Route::apiResource('chunks', ChunkController::class);
Route::apiResource('snippets', SnippetController::class);
Route::apiResource('plugins', PluginController::class);
Route::apiResource('modules', ModuleController::class);

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
