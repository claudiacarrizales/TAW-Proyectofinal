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

Route::get('/usuarios', 'UserController@index')->name('usuarios.index');
Route::post('/registrarUsuario', 'UserController@store')->name('usuarios.store');
Route::delete('/eliminarUsuario/{id}', 'UserController@destroy')->name('usuarios.destroy');
Route::post('/actualizarUsuario', 'UserController@update')->name('usuarios.update');

//Route::group(['middleware'=>['access:1']], function(){

    //Route::get('/usuarios', 'UserController@index' )->name('usuarios.index');

//});