<?php

use App\Controllers\HomeController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->post('savecollection', 'HomeController::SaveCollection');
$routes->get('getclientdatabyclientid', 'HomeController::GetClientDataByClientID');
