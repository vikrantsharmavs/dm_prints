<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->match(['get', 'post'], '/', 'Login::index');
$routes->get('dashboard', 'Home::index', ['filter' => 'super_logged']);
$routes->get('party', "Party::index", ['filter' => 'super_logged']);
$routes->match(['get', 'post'], 'party-add', "Party::add", ['filter' => 'super_logged']);
$routes->match(['get', 'post'], 'party-edit/(:num)', "Party::add/$1", ['filter' => 'super_logged']);
$routes->get('update-party-status/(:num)/(:any)', 'Party::update_status/$1/$2', ['filter' => 'super_logged']);

$routes->get('quality', "Quality::index", ['filter' => 'super_logged']);
$routes->match(['get', 'post'], 'quality-add', "Quality::add", ['filter' => 'super_logged']);
$routes->match(['get', 'post'], 'quality-edit/(:num)', "Quality::add/$1", ['filter' => 'super_logged']);
$routes->get('update-quality-status/(:num)/(:any)', 'Quality::update_status/$1/$2', ['filter' => 'super_logged']);



$routes->get('color', "Color::index", ['filter' => 'super_logged']);
$routes->match(['get', 'post'], 'color-add', "Color::add", ['filter' => 'super_logged']);
$routes->match(['get', 'post'], 'color-edit/(:num)', "Color::add/$1", ['filter' => 'super_logged']);
$routes->get('update-color-status/(:num)/(:any)', 'Color::update_status/$1/$2', ['filter' => 'super_logged']);


$routes->get('unit', "Unit::index", ['filter' => 'super_logged']);
$routes->match(['get', 'post'], 'unit-add', "Unit::add", ['filter' => 'super_logged']);
$routes->match(['get', 'post'], 'unit-edit/(:num)', "Unit::add/$1", ['filter' => 'super_logged']);
$routes->get('update-unit-status/(:num)/(:any)', 'Unit::update_status/$1/$2', ['filter' => 'super_logged']);


$routes->get('weight', "Weight::index", ['filter' => 'super_logged']);
$routes->match(['get', 'post'], 'weight-add', "Weight::add", ['filter' => 'super_logged']);
$routes->match(['get', 'post'], 'weight-edit/(:num)', "Weight::add/$1", ['filter' => 'super_logged']);
$routes->get('update-weight-status/(:num)/(:any)', 'Weight::update_status/$1/$2', ['filter' => 'super_logged']);

$routes->get('receiving', "Receiving::index", ['filter' => 'super_logged']);
$routes->match(['get', 'post'], 'receiving-add', "Receiving::add", ['filter' => 'super_logged']);
$routes->match(['get', 'post'], 'receiving-edit/(:num)', "Receiving::edit/$1", ['filter' => 'super_logged']);

$routes->get('receiving-bag', "ReceivingBag::index", ['filter' => 'super_logged']);
$routes->post('submitValue', "ReceivingBag::submitValue", ['filter' => 'super_logged']);




$routes->post('sendDataReceiving', "Receiving::sendDataReceiving", ['filter' => 'super_logged']);
$routes->post('receiveBagData', "ReceivingBag::receiveBagData", ['filter' => 'super_logged']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
