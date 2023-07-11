<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ClienteController;
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

Route::get('clientes', 'ClienteController@index');
Route::post('crearcliente', 'ClienteController@Create');
Route::post('eliminar/{clienteId}', 'ClienteController@eliminar');
Route::post('eliminarpago/{COD}', 'ClienteController@eliminarpago');
Route::get('buscar/{clienteId}', 'ClienteController@buscar');
Route::get('buscarmonto/{clienteId}', 'ClienteController@buscarMonto');
