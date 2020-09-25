<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

// Product
$router->get('/product', 'ProductController@index'); // show all data
$router->post('/product', 'ProductController@create'); // post data
$router->get('/product/{id}', 'ProductController@show'); // show data with id or detail data
$router->put('/product/{id}', 'ProductController@update'); // update data with id or detail data
$router->delete('/product/{id}', 'ProductController@destroy'); // update data with id or detail data

// Auth
$router->post('/register', 'UserController@register'); // register
$router->post('/login', 'UserController@login'); // login
