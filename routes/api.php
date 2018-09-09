<?php

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

$router = app('Dingo\Api\Routing\Router');

$router->version('v1', ['namespace' => 'App\Http\Controllers\Api\Auth'], function($api) {
	
	$api->group(['prefix' => 'auth'], function($api) {

		$api->post('/register', ['as' => 'auth.register', 'uses' => 'RegisterController@store']);
		$api->post('/token', ['as' => 'auth.token', 'uses' => 'TokenController@authenticate']);
	});
});

$router->version('v1', ['namespace' => 'App\Http\Controllers\Api'], function($api) {
	require __DIR__ . '/version1.php';
});
