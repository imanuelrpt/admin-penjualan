<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home & Auth
$routes->get('/', 'Home::index');

$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');
$routes->get('/register', 'Login::register');
$routes->post('/register/save', 'Login::save');

// Dashboard
$routes->get('/dashboard', 'Dashboard::index');

// Konsumen
$routes->get('/konsumen', 'Konsumen::index');
$routes->get('/konsumen/create', 'Konsumen::create');
$routes->post('/konsumen/save', 'Konsumen::save');
$routes->get('/konsumen/(:num)', 'Konsumen::detail/$1');
$routes->get('/konsumen/edit/(:num)', 'Konsumen::edit/$1');
$routes->post('/konsumen/update/(:num)', 'Konsumen::update/$1');
$routes->get('/konsumen/delete/(:num)', 'Konsumen::delete/$1');

// Barang
$routes->get('/barang', 'Barang::index');
$routes->get('/barang/create', 'Barang::create');
$routes->post('/barang/save', 'Barang::save');
$routes->get('/barang/(:num)', 'Barang::detail/$1');
$routes->get('/barang/edit/(:num)', 'Barang::edit/$1');
$routes->post('/barang/update/(:num)', 'Barang::update/$1');
$routes->get('/barang/delete/(:num)', 'Barang::delete/$1');

// Penjualan
$routes->get('/penjualan', 'Penjualan::index');
$routes->get('/penjualan/create', 'Penjualan::create');
$routes->post('/penjualan/save', 'Penjualan::save');
$routes->get('/penjualan/(:num)', 'Penjualan::detail/$1');
$routes->get('/penjualan/edit/(:num)', 'Penjualan::edit/$1');
$routes->post('/penjualan/update/(:num)', 'Penjualan::update/$1');
$routes->get('/penjualan/delete/(:num)', 'Penjualan::delete/$1');

// Barang Masuk
$routes->get('/barangmasuk', 'BarangMasuk::index');
$routes->get('/barangmasuk/create', 'BarangMasuk::create');
$routes->post('/barangmasuk/save', 'BarangMasuk::save');
$routes->get('/barangmasuk/edit/(:num)', 'BarangMasuk::edit/$1');
$routes->post('/barangmasuk/update/(:num)', 'BarangMasuk::update/$1');
$routes->get('/barangmasuk/delete/(:num)', 'BarangMasuk::delete/$1');
$routes->get('/barangmasuk/cetak', 'BarangMasuk::cetak');

// Laporan
$routes->get('/laporan', 'Laporan::index');
$routes->get('/laporan/penjualan', 'Laporan::penjualan');
$routes->post('/laporan/penjualan', 'Laporan::penjualan');

$routes->get('/laporan/barangmasuk', 'Laporan::barangMasuk');
$routes->post('/laporan/barangmasuk', 'Laporan::barangMasuk');

$routes->get('/laporan/perbarang', 'Laporan::perBarang');
$routes->get('/laporan/perkonsumen', 'Laporan::perKonsumen');
