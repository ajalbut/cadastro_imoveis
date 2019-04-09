<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'ImovelController@index');
	Route::get('imoveis', 'ImovelController@index');
	Route::get('imoveis/inserir', 'ImovelController@create');
	Route::post('imoveis/inserir', 'ImovelController@store');
	Route::get('imoveis/editar/{id}', 'ImovelController@edit');
	Route::patch('imoveis/editar/{id}', 'ImovelController@update');
	Route::delete('imoveis/deletar/{id}', 'ImovelController@delete');
});
// Route::resource('imoveis', 'ImovelController');
Route::auth();

Route::get('/home', 'HomeController@index');
