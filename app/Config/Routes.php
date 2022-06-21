<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/home', 'Home::index');
$routes->addRedirect('/', 'home');

$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/produk', 'Produk::index');
$routes->get('/produk/(:num)', 'Produk::getProdukById/$1');
$routes->post('/produk', 'Produk::create');
$routes->delete('/produk/(:num)', 'Produk::delete/$1');



$routes->get('/transaksi-in', 'TransaksiIn::listTransIn');
$routes->get('/transaksi-in/detail/(:alphanum)', 'TransaksiIn::detailTransIn/$1');
$routes->get('/transaksi-in/add', 'TransaksiIn::formAdd');
$routes->post('/transaksi-in/add', 'TransaksiIn::prosesAdd');

$routes->get('/transaksi-out', 'TransaksiOut::listTransOut');
$routes->get('/transaksi-out/detail/(:alphanum)', 'TransaksiOut::detailTransOut/$1');
$routes->get('/transaksi-out/add', 'TransaksiOut::formAdd');
$routes->post('/transaksi-out/add', 'TransaksiOut::prosesAdd');

$routes->get('/transaksi-out/print', 'TransaksiOut::printSuratJalan');

$routes->get('/stock', 'Stock::index');
$routes->get('/stock/print', 'Stock::printStock');
$routes->get('/stock/transaksi', 'Stock::printTransaksi');




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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
