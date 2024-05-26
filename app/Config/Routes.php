<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;
use CodeIgniter\Router\Router;

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */


$routes->get('/', 'Home::index');


// metode GET untuk mengambil data dari server baseline endpoint new for fetch data user created
$routes->get('users', 'UserController::index');


// Tambahkan rute untuk metode register - POST 
$routes->post('user/register', 'UserController::register');


// Tambahkan rute untuk metode create user - POST 

$routes->post('user/create', 'User::create');


//update password - PUT/PATCH 
$routes->put('user/updatePassword/(:num)', 'UserController::updatePassword/$1');


// delete data dari server
$routes->delete('user/delete/(:num)', 'UserController::delete/$1');



/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to override the defaults in this file. Environment based routes
 * is one such time. require() additional route files here to make that
 * happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
