<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Obce::index');
$routes->get('obceStranka/(:num)', 'Obce::obceStranka/$1');
///$routes->get('station_dataStranka/(:num)', 'Pocasi::station_dataStranka/$1');
///$routes->get('stanice/zeme/(:num)', 'Pocasi::stanice/$1');
///$routes->get('allStation', 'Pocasi::allStation');
