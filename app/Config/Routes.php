<?php

use App\Controllers\HomeController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home Routes

$routes->get('/', 'HomeController::index');
$routes->post('savecollection', 'HomeController::SaveCollection');
$routes->get('getclientdatabyclientid', 'HomeController::GetClientDataByClientID');

// Generate Report Routes

$routes->get('generate', 'GenerateReportController::pagelaod');
