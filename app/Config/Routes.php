<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


service('auth')->routes($routes);

$routes->get('/', '\App\Controllers\Authentication\LoginAndRegisterController::index');

$routes->group('api', function($routes){
    $routes->post('register', '\App\Controllers\Authentication\LoginAndRegisterController::register');
    //POST
    $routes->post('login', 'LoginAndRegisterController::login');
    //GET
    $routes->get('profile', 'LoginAndRegisterController::profile');
    //GET
    $routes->get('logout', 'LoginAndRegisterController::logout');
});
