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
Route::post('/login/auth', 'LoginController@auth');
Route::get('/login/cadastrar', 'LoginController@newUser');
Route::post('/login/cadastrar', 'LoginController@create');
