<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Anasayfa::index');
$routes->match(['get','post'],'icecekler', 'Anasayfa::icecekler');
$routes->match(['get','post'],'yiyecekler', 'Anasayfa::yiyecekler');
$routes->match(['get','post'],'siparis', 'Anasayfa::siparis');
$routes->match(['get','post'],'admin', 'Anasayfa::admin');
$routes->get('mongo/(:num)', 'Home::test/$1');
