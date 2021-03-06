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
Route::middleware('auth')->prefix('auth')->group(function() {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

// Fuera del resto para evitar middleware auth.
Route::post('auth/login', 'AuthController@login');


// Rutas de prueba
Route::prefix('algo')->group(function() {
    Route::middleware('permission:listar algo')->get('/', 'TestController@listarAlgo');
    Route::middleware('permission:crear algo')->post('/', 'TestController@crearAlgo');
    Route::middleware('permission:eliminar algo')->delete('/', 'TestController@eliminarAlgo');
});

Route::prefix('check')->middleware('auth')->group(function(){
    Route::get('/permiso', 'CheckController@permiso');
    Route::get('/rol', 'CheckController@rol');
});
