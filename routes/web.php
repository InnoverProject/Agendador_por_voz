<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(array('before' => 'auth'), function(){

Route::post('users/grid', 'UsuarioController@grid');
Route::post('users/store', 'UsuarioController@store');
Route::post('users/update', 'UsuarioController@update');
Route::post('doctor/grid', 'MedicoController@grid');
Route::post('doctor/store', 'MedicoController@store');
Route::post('doctor/update', 'MedicoController@update');
Route::post('especial/grid', 'EspecialidadController@grid');
Route::post('especial/store', 'EspecialidadController@store');
Route::post('especial/update', 'EspecialidadController@update');
Route::post('patient/grid', 'PacienteController@grid');
Route::post('patient/store', 'PacienteController@store');
Route::post('patient/update', 'PacienteController@update');
Route::get('users/{id}/edit', 'UsuarioController@edit');




Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/users', 'UsuarioController');
Route::resource('/doctor', 'MedicoController');
Route::resource('/especial', 'EspecialidadController');
Route::resource('/patient', 'PacienteController');



});