<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResources(['user' => 'API\UserController']);

//Rutas que controlan a los usuarios
Route::get('/usuarios', 'UserController@index')->name('usuarios.index');
Route::post('/registrarUsuario', 'UserController@store')->name('usuarios.store');
Route::delete('/eliminarUsuario/{id}', 'UserController@destroy')->name('usuarios.destroy');
Route::post('/actualizarUsuario', 'UserController@update')->name('usuarios.update');

//Rutas qeu controlan las enfermedades
Route::get('/obtenerEnfermedades', 'EnfermedadesController@index')->name('enfermedades.index');

//Rutas que controlan la informacion de los pacientes
Route::get('/obtenerPacientes', 'PacientesController@index')->name('pacientes.index');
Route::post('/registrarPaciente', 'PacientesController@store')->name('pacientes.store');
Route::post('/actualizarPaciente', 'PacientesController@update')->name('pacientes.update');
Route::delete('/eliminarPaciente/{id}', 'PacientesController@destroy')->name('pacientes.delete');