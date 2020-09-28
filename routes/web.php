<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->post('users',['as' => 'users.store','uses'=> 'UserController@store']);
$router->post('login', ['as' => 'login', 'uses' => 'UserController@login']);

$router->group(['middleware' => 'auth'], function () use ($router) {

    $router->get('user/profile', function () {
        echo "hola mundo";
    });
    $router->post('logout', ['as' => 'logout', 'uses' => 'UserController@logout']);

    $router->get('user', function () use ($router) {
        return auth()->user();
    });
});


$router->get('/', function () use ($router) {
    return $router->app->version();
});
