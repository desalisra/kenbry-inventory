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
$routes->get('/administrator', 'Auth::adminForm');
$routes->post('/administrator', 'Auth::addAccount');
$routes->get('/administrator/(:num)', 'Auth::deleteAccount/$1');



// Master Karyawan
$routes->get('/karyawan', 'Karyawan::index');
$routes->get('/karyawan/(:alphanum)', 'Karyawan::getKaryawanByNip/$1');
$routes->post('/karyawan', 'Karyawan::create');
$routes->delete('/karyawan/(:alphanum)', 'Karyawan::delete/$1');

$routes->get('/produk', 'Produk::index');
$routes->get('/produk/(:alphanum)', 'Produk::getProdukById/$1');
$routes->post('/produk', 'Produk::create');
$routes->delete('/produk/(:num)', 'Produk::delete/$1');

$routes->get('/customer', 'Customer::index');
$routes->get('/customer/(:num)', 'Customer::getCustomerById/$1');
$routes->post('/customer', 'Customer::create');
$routes->delete('/customer/(:num)', 'Customer::delete/$1');


// Receiving
$routes->get('/receiving', 'Receiving::index');
$routes->get('/receiving/detail/(:alphanum)', 'Receiving::detail/$1');
$routes->get('/receiving/add', 'Receiving::formAdd');
$routes->post('/receiving/add', 'Receiving::prosesAdd');


$routes->get('/purchase', 'Purchase::index');
$routes->post('/purchase', 'Purchase::prosesPesanan');
$routes->get('/purchase/detail/(:alphanum)', 'Purchase::detail/$1');
$routes->get('/purchase/print/(:alphanum)', 'Purchase::print/$1');

$routes->get('/shipping', 'Shipping::index');
$routes->get('/shipping/detail/(:alphanum)', 'Shipping::detail/$1');
$routes->get('/surat-jalan/(:alphanum)', 'Shipping::printSuratJalan/$1');
$routes->get('/surat-jalan/kirim/(:alphanum)', 'Shipping::kirim/$1');


$routes->get('/stock', 'Stock::index');
$routes->get('/stock/print', 'Stock::printStock');
$routes->get('/stock/transaksi', 'Stock::printTransaksi');

$routes->get('/history-transaksi', 'Laporan::index');
$routes->get('/history-transaksi/search', 'Laporan::search');
$routes->get('/history-transaksi/detail/(:alphanum)', 'Laporan::detail/$1');
$routes->get('/history-transaksi/print/(:alphanum)', 'Laporan::print/$1');



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
