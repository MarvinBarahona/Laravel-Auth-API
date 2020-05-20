<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rutas de autenticación
Route::prefix('auth')->group(function() {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});


// Rutas de prueba
Route::prefix('algo')->group(function() {
    Route::middleware('permission:listar algo')->get('/', 'TestController@listarAlgo');
    Route::middleware('permission:crear algo')->post('/', 'TestController@crearAlgo');
    Route::middleware('permission:eliminar algo')->delete('/', 'TestController@eliminarAlgo');
});
