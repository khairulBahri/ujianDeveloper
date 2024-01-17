<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  $this->setAutoRoute(true);
$routes->get('/', 'Main::index');

$routes->get('reportProduct', 'ReportProductController::index');
$routes->post('reportProduct/tampilGrafik', 'ReportProductController::tampilGrafik');
$routes->get('reportProduct/chart', 'ReportProductController::chart');
$routes->get('reportProduct/getData', 'ReportProductController::getData');







