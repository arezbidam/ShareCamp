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
$routes->get('/', 'Frontend::index');
$routes->get('/login', 'frontend/Auth::index', ['filter' => 'UserLogged']);
$routes->post('/sign-in', 'frontend/Auth::signIn');
$routes->get('/sign-up', 'frontend/Auth::signUp', ['filter' => 'UserLogged']);
$routes->post('/register', 'frontend/Auth::register');
$routes->get('/logout', 'frontend/Auth::signOut');


$routes->get('/profile', 'frontend/Profile::index', ['filter' => 'auth']);
$routes->post('/profile/update-data-pribadi', 'frontend/Profile::updateDataPribadi', ['filter' => 'auth']);
$routes->post('/profile/update-data-rekening', 'frontend/Profile::updateDataRekening', ['filter' => 'auth']);
$routes->post('/profile/ubah-password', 'frontend/Profile::update_password', ['filter' => 'auth']);


// route - toko saya
$routes->get('/toko', 'frontend/Toko::index', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/toko/create', 'frontend/Toko::create', ['filter' => 'auth']);
$routes->post('/toko/edit', 'frontend/Toko::edit', ['filter' => 'auth']);
$routes->post('/toko/save', 'frontend/Toko::save', ['filter' => 'auth']);
$routes->post('/toko/delete', 'frontend/Toko::delete', ['filter' => 'auth']);
$routes->post('/toko/update', 'frontend/Toko::update', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/toko/produk', 'frontend/Produk::index', ['filter' => 'auth']);
$routes->get('/toko/produk/create', 'frontend/Produk::create', ['filter' => 'auth']);
$routes->post('/toko/produk/save', 'frontend/Produk::save', ['filter' => 'auth']);
$routes->post('/toko/produk/detail', 'frontend/Produk::detail', ['filter' => 'auth']);
$routes->get('/toko/produk/edit/(:num)', 'frontend/Produk::edit', ['filter' => 'auth']);
$routes->post('/toko/produk/update', 'frontend/Produk::update', ['filter' => 'auth']);
$routes->post('/toko/produk/delete', 'frontend/Produk::delete', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/toko/pesanan', 'frontend/PesananToko::index', ['filter' => 'auth']);
$routes->post('/toko/pesanan/update-pembayaran', 'frontend/PesananToko::update_pembayaran', ['filter' => 'auth']);
$routes->post('/toko/pesanan/delete', 'frontend/PesananToko::delete', ['filter' => 'auth']);


// route - fitur shop (penyewaan)
$routes->match(['get', 'post'], '/shop/produk', 'frontend/Shop::index');
$routes->post('/shop/keranjang/add', 'frontend/Keranjang::add');

// route - fitur keranjang
$routes->match(['get', 'post'], '/keranjang', 'frontend/Keranjang::index', ['filter' => 'auth']);
$routes->post('/keranjang/checkout', 'frontend/Keranjang::checkout');

// route - fitur pesanan
$routes->match(['get', 'post'], '/pesanan', 'frontend/Pesanan::index', ['filter' => 'auth']);
$routes->get('/pesanan/sukses', 'frontend/Pesanan::detail', ['filter' => 'auth']);
$routes->get('/pesanan/print/(:any)', 'frontend/Pesanan::print');

// route - cari teman camping
$routes->match(['get', 'post'], '/cari-teman', 'frontend/Teman::index');
$routes->get('/cari-teman/add', 'frontend/Teman::add', ['filter' => 'auth']);
$routes->post('/cari-teman/save', 'frontend/Teman::save', ['filter' => 'auth']);
$routes->post('/cari-teman/join-sharecamp', 'frontend/Teman::join', ['filter' => 'auth']);
$routes->post('/cari-teman/hapus-sharecamp', 'frontend/Teman::hapus', ['filter' => 'auth']);
$routes->post('/cari-teman/keluar-sharecamp', 'frontend/Teman::keluar', ['filter' => 'auth']);



// admin - auth
$routes->get('/admin', 'admin/Auth::index');
$routes->post('/admin/sign-in', 'admin/Auth::signIn');
$routes->get('/admin/sign-out', 'admin/Auth::signOut');


$routes->get('/admin/dashboard', 'admin/Dashboard::index');
$routes->get('/admin/kategori', 'admin/Kategori::index');
$routes->get('/admin/kategori/add', 'admin/Kategori::add');
$routes->post('/admin/kategori/edit', 'admin/Kategori::edit');
$routes->post('/admin/kategori/save', 'admin/Kategori::save');
$routes->post('/admin/kategori/update', 'admin/Kategori::update');
$routes->get('/admin/toko', 'admin/Toko::index');
$routes->get('/admin/toko/add', 'admin/Toko::add');
$routes->post('/admin/toko/acc', 'admin/Toko::acc');
$routes->post('/admin/toko/tolak', 'admin/Toko::tolak');
$routes->post('/admin/toko/edit', 'admin/Toko::edit');
$routes->post('/admin/toko/save', 'admin/Toko::save');
$routes->post('/admin/toko/update', 'admin/Toko::update');


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
