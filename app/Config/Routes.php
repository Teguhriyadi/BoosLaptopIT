<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', "Auth\LoginController::index");

$routes->get("/login", "Auth\LoginController::index");
$routes->post("/login/proses_login", "Auth\LoginController::proses_login");

$routes->get("/dashboard", "AppController::index", ["filter" => "autentikasi"]);

// Data Jurnal Penerimaan Kas
$routes->get("jurnal/penerimaan", "Transaksi\JurnalPenerimaanKasController::index", ["filter" => "autentikasi"]);
$routes->post("jurnal/penerimaan/store", "Transaksi\JurnalPenerimaanKasController::store", ["filter" => "autentikasi"]);
$routes->post("jurnal/penerimaan/(:segment)", "Transaksi\JurnalPenerimaanKasController::edit/$1");
$routes->post("jurnal/penerimaan/(:segment)/hapus", "Transaksi\JurnalPenerimaanKasController::destroy/$1");

// Data Jurnal Pengeluaran Kas
$routes->get("jurnal/pengeluaran", "Transaksi\JurnalPengeluaranKasController::index", ["filter" => "autentikasi"]);
$routes->post("jurnal/pengeluaran/store", "Transaksi\JurnalPengeluaranKasController::store", ["filter" => "autentikasi"]);
$routes->post("jurnal/pengeluaran/(:segment)", "Transaksi\JurnalPengeluaranKasController::edit/$1");
$routes->post("jurnal/pengeluaran/(:segment)/hapus", "Transaksi\JurnalPengeluaranKasController::destroy/$1");

// Data Beban Operasional
$routes->get("beban_operasional", "Master\BebanOperasionalController::index", ["filter" => "autentikasi"]);
$routes->post("beban_operasional/store", "Master\BebanOperasionalController::store", ["filter" => "autentikasi"]);
$routes->post("beban_operasional/(:segment)", "Master\BebanOperasionalController::edit/$1", ["filter" => "autentikasi"]);
$routes->post("beban_operasional/(:segment)/hapus", "Master\BebanOperasionalController::destroy/$1", ["filter" => "autentikasi"]);

// Data Penerimaan Kas
$routes->get("transaksi/penerimaan_kas", "Transaksi\PenerimaanKasController::index", ["filter" => "autentikasi"]);
$routes->post("transaksi/penerimaan_kas/store", "Transaksi\PenerimaanKasController::store", ["filter" => "autentikasi"]);
$routes->post("transaksi/penerimaan_kas/(:segment)", "Transaksi\PenerimaanKasController::edit/$1", ["filter" => "autentikasi"]);
$routes->post("transaksi/penerimaan_kas/(:segment)/hapus", "Transaksi\PenerimaanKasController::destroy/$1", ["filter" => "autentikasi"]);

// Data Pengeluaran Kas
$routes->get("transaksi/pengeluaran_kas", "Transaksi\PengeluaranKasController::index", ["filter" => "autentikasi"]);
$routes->post("transaksi/pengeluaran_kas/store", "Transaksi\PengeluaranKasController::store", ["filter" => "autentikasi"]);
$routes->post("transaksi/pengeluaran_kas/(:segment)", "Transaksi\PengeluaranKasController::edit/$1", ["filter" => "autentikasi"]);
$routes->post("transaksi/pengeluaran_kas/(:segment)/hapus", "Transaksi\PengeluaranKasController::destroy/$1", ["filter" => "autentikasi"]);

// Data Rekap Laporan
$routes->get("laporan/rekap", 'Laporan\RekapController::index', ["filter" => "autentikasi"]);
$routes->post("laporan/rekap/cari", "Laporan\RekapController::cari", ["filter" => "autentikasi"]);

// Data Beban Operasional
$routes->get("bagian_keuangan", "Master\BagianKeuanganController::index", ["filter" => "autentikasi"]);
$routes->post("bagian_keuangan/store", "Master\BagianKeuanganController::store", ["filter" => "autentikasi"]);
$routes->post("bagian_keuangan/(:segment)", "Master\BagianKeuanganController::edit/$1", ["filter" => "autentikasi"]);
$routes->post("bagian_keuangan/(:segment)/hapus", "Master\BagianKeuanganController::destroy/$1", ["filter" => "autentikasi"]);

// Data Servis Laptop
$routes->get("servis_laptop", "Transaksi\ServisLaptopController::index", ["filter" => "autentikasi"]);
$routes->post("servis_laptop/store", "Transaksi\ServisLaptopController::store", ["filter" => "autentikasi"]);
$routes->post("servis_laptop/(:segment)", "Transaksi\ServisLaptopController::edit/$1", ["filter" => "autentikasi"]);
$routes->post("servis_laptop/(:segment)/hapus", "Transaksi\ServisLaptopController::destroy/$1", ["filter" => "autentikasi"]);

// Data Users
$routes->get("users", "Akun\UserController::index", ["filter" => "autentikasi"]);
$routes->post("users/store", "Akun\UserController::store", ["filter" => "autentikasi"]);
$routes->post("users/(:segment)", "Akun\UserController::edit/$1", ["filter" => "autentikasi"]);
$routes->post("users/(:segment)/hapus", "Akun\UserController::destroy/$1", ["filter" => "autentikasi"]);

$routes->get("/logout", "Auth\LoginController::logout", ["filter" => "autentikasi"]);
// $routes
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
