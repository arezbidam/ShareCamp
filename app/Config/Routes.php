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
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index', ['filter' => 'UserLogged']);
$routes->get('/logout', 'Login::logOut');
$routes->get('/signIn', 'Login::signIn');
$routes->get('/signUp', 'Login::signUp', ['filter' => 'UserLogged']);
$routes->get('/register', 'Register::index');

$routes->get('/products', 'products::index');

$routes->get('/profil', 'Profile::index', ['filter' => 'UserReq']);
$routes->get('/profile', 'Profile::index', ['filter' => 'UserReq']);
$routes->get('/profile/update/(:num)', 'Profile::update/$1', ['filter' => 'UserReq']);

$routes->get('/toko', 'Toko::index', ['filter' => 'auth']);
$routes->get('/toko/create', 'Toko::create', ['filter' => 'auth']);
$routes->post('/toko/save', 'Toko::save', ['filter' => 'auth']);
$routes->get('/toko/barang/create', 'Toko::create_barang', ['filter' => 'auth']);
$routes->post('/toko/barang/save', 'Toko::save_barang', ['filter' => 'auth']);
$routes->post('/toko/barang/detail', 'Toko::detail_barang', ['filter' => 'auth']);
$routes->post('/toko/barang/edit', 'Toko::edit_barang', ['filter' => 'auth']);
$routes->post('/toko/barang/update', 'Toko::update_barang', ['filter' => 'auth']);
$routes->post('/toko/barang/hapus', 'Toko::delete_barang', ['filter' => 'auth']);

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
