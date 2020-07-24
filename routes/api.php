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

//Rutas del dashboard
Route::get('/totalusuarios', 'DashboardController@obtenertotalusuarios');
Route::get('/totalcitas', 'DashboardController@obtenertotalcitas');
Route::get('/totalenfermedades', 'DashboardController@obtenertotalenfermedades');
Route::get('/totalpacientes', 'DashboardController@obtenertotalpacientes');

//Rutas que controlan a los usuarios
Route::get('/usuarios', 'UserController@index')->name('usuarios.index');
Route::post('/registrarUsuario', 'UserController@store')->name('usuarios.store');
Route::delete('/eliminarUsuario/{id}', 'UserController@destroy')->name('usuarios.destroy');
Route::post('/actualizarUsuario', 'UserController@update')->name('usuarios.update');
Route::get('/obtenerDoctores', 'UserController@doctores')->name('usuarios.doctores');

//Rutas qeu controlan las enfermedades
Route::get('/obtenerEnfermedades', 'EnfermedadesController@index')->name('enfermedades.index');
Route::post('/registrarenfermedad', 'EnfermedadesController@store')->name('enfermedades.store');
Route::post('/actualizarenfermedad', 'EnfermedadesController@update')->name('enfermedades.update');
Route::delete('/eliminarenfermedad/{id}', 'EnfermedadesController@destroy')->name('enfermedades.destoy');

//Rutas que controlan la informacion de los pacientes
Route::get('/obtenerPacientes', 'PacientesController@index')->name('pacientes.index');
Route::post('/registrarPaciente', 'PacientesController@store')->name('pacientes.store');
Route::post('/actualizarPaciente', 'PacientesController@update')->name('pacientes.update');
Route::delete('/eliminarPaciente/{id}', 'PacientesController@destroy')->name('pacientes.delete');

//Rutas que controlan la informacion de las citas
Route::get('/cita', 'CitasController@index')->name('pacientes.index');
Route::post('/agendarcita', 'CitasController@store')->name('pacientes.index');
Route::delete('/eliminarcita/{id}', 'CitasController@destroy')->name('pacientes.destroy');
Route::post('/actualizarcita', 'CitasController@update')->name('citas.update');

//Rutas que controlan la informacio de los medicamento
Route::get('/obtenermedicamentos', 'MedicamentoController@index')->name('pacientes.index');
Route::post('/registrarMedicamento', 'MedicamentoController@store')->name('pacientes.store');
Route::post('/actualizarMedicamento', 'MedicamentoController@update')->name('pacientes.update');
Route::delete('/eliminarMedicamento/{id}', 'MedicamentoController@destroy')->name('pacientes.delete');


//Rutas que controlan la información de las alergias
Route::get('/obteneralergias', 'AlergiasController@index')->name('AlergiasController.index');
Route::post('/registrarAlergia', 'AlergiasController@store')->name('AlergiasController.store');
Route::post('/actualizarAlergia', 'AlergiasController@update')->name('AlergiasController.update');
Route::delete('/eliminarAlergia/{id}', 'AlergiasController@destroy')->name('AlergiasController.delete');