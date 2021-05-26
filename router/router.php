<?php

use Bramus\Router\Router;

$router = new Router();

$router->setNamespace('\App\Controllers');

//Welcome
$router->get('/', 'HomeController@index');

//User
$router->get('users', 'UserController@index');
$router->get('create', 'UserController@create');
$router->post('register', 'UserController@register');
$router->post('search', 'UserController@search');

//Auth
$router->post('login', 'AuthController@login');
$router->get('logout', 'AuthController@logout');


$router->run();
