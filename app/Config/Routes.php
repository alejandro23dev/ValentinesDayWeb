<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('user1');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('create', 'Home::create');
#HOME
$routes->post('Home/uploadRegalo', 'Home::uploadRegalo');
$routes->post('Home/uploadPhoto', 'Home::uploadPhoto');
$routes->get('Home/userGive', 'Home::userGive');
$routes->get('Home/userObtain', 'Home::userObtain');
$routes->post('Home/getRegalos', 'Home::getRegalos');
$routes->post('Home/deleteRegalo', 'Home::deleteRegalo');
$routes->post('Home/obtainRegalo', 'Home::obtainRegalo');
$routes->post('Home/modalCreate', 'Home::modalCreate');
#LOGIN
$routes->get('/', 'Login::index');
$routes->post('Login/loginUserGive', 'Login::loginUserGive');
$routes->post('Login/loginUserObtain', 'Login::loginUserObtain');
#REGISTER
$routes->post('Login/registerUser', 'Login::registerUser');

















if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
