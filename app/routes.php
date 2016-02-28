<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@auth');
Route::get('/login/cadastrar', 'LoginController@newUser');
Route::post('/login/cadastrar', 'LoginController@create');
Route::get('/logout', 'LoginController@logout');

if (Session::has('user')) {

   Route::get('/seletivos', 'SeletivosController@retrieve');
   Route::post('/seletivos', 'SeletivosController@search');
   Route::get('/seletivos/cadastrar', 'SeletivosController@novoSeletivo');
   Route::post('/seletivos/cadastrar', 'SeletivosController@create');
   Route::get('/seletivos/update/{seletivoid}', 'SeletivosController@edit');
   Route::post('/seletivos/update/{seletivoid}', 'SeletivosController@update');
   Route::get('/seletivos/delete/{seletivoid}', 'SeletivosController@delete');

   Route::get('/cargos', 'CargosController@retrieve');
   Route::post('/cargos', 'CargosController@search');
   Route::get('/cargos/cadastrar', 'CargosController@novoCargo');
   Route::post('/cargos/cadastrar', 'CargosController@create');
   Route::get('/cargos/update/{cargoid}', 'CargosController@edit');
   Route::post('/cargos/update/{cargoid}', 'CargosController@update');
   Route::get('/cargos/delete/{cargoid}', 'CargosController@delete');

   Route::get('/inscritos', 'InscritosController@retrieve');
   Route::post('/inscritos', 'InscritosController@search');
   Route::get('/inscritos/update/{inscritoid}', 'InscritosController@edit');
   Route::post('/inscritos/update/{inscritoid}', 'InscritosController@update');
   Route::get('/inscritos/delete/{inscritoid}', 'InscritosController@delete');

}
