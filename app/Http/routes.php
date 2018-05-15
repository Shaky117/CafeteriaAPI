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

Route::auth();

Route::get('/', ["uses" => 'HomeController@index', 'as' => 'index']);

Route::resource('usuarios', 'UsuarioController');
Route::resource('comidas', 'ComidaController');
Route::resource('pedidos','PedidoController');

//Rutas de la api
Route::get('/api/comidas',
    ["uses" => 'PedidoApiController@getComidas', 
    'as' => 'api.pedidos.getcomidas']);

Route::get('/api/pedidos/{idUsuario}',
    ['uses' => 'PedidoApiController@getPedidosUsuario',
    'as' => 'api.pedidos.getpedidosusuario']);

Route::post('/api/login', 
    ['uses' => 'LoginApiController@login',
    'as' => 'api.login']);
