<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


service('auth')->routes($routes);

$routes->get('/', '\App\Controllers\LoginAndRegisterController::index');

$routes->group('api', function($routes){
        $routes->post('register', '\App\Controllers\LoginAndRegisterController::register');
        //POST
        $routes->post('login', '\App\Controllers\LoginAndRegisterController::login');
        //GET
        $routes->get('profile', 'LoginAndRegisterController::profile');
        //GET
        $routes->get('logout', 'LoginAndRegisterController::logout');

        $routes->get('getclientdetails', '\App\Controllers\ClientDetailController::getClientDetails');

        $routes->get('searchclientdetails', '\App\Controllers\ClientDetailController::ClientSearch');

        $routes->get('getserverdetails', '\App\Controllers\ClientDetailController::getServerdetail');

        $routes->post('updateclientdetail', '\App\Controllers\ClientDetailController::updateClientDetail');

    }
);
