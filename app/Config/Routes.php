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
$routes->setDefaultNamespace('');
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
$routes->get('/', 'App\Modules\Auth\Controllers\Home::index');
$routes->get('home', 'App\Modules\Auth\Controllers\Home::index');

$routes->group('auth', function ($routes) {
    $routes->get('login', 'App\Modules\Auth\Controllers\Login::index');
    $routes->add('login/(:any)', 'App\Modules\Auth\Controllers\Login::$1');
    $routes->get('register', 'App\Modules\Auth\Controllers\Register::index');
    $routes->add('register/(:any)', 'App\Modules\Auth\Controllers\Register::$1');
});

$routes->group('admin', function ($routes) {
    $routes->get('dashboard', 'App\Modules\Admin\Controllers\Dashboard::index');
    $routes->get('pembalap', 'App\Modules\Admin\Controllers\Pembalap::index');
    $routes->get('pembalap/tambah', 'App\Modules\Admin\Controllers\Pembalap::tambah');
    $routes->get('pembalap/edit/(:segment)', 'App\Modules\Admin\Controllers\Pembalap::edit/$1');
    $routes->add('pembalap/(:any)', 'App\Modules\Admin\Controllers\Pembalap::$1');
    $routes->get('pembalap/(:num)', 'App\Modules\Admin\Controllers\Pembalap::hapus/$1');
    $routes->get('pembalap/printPDF', 'App\Modules\Admin\Controllers\Pembalap::printPDF');
    $routes->get('pembalap/printWord', 'App\Modules\Admin\Controllers\Pembalap::printWord');
    $routes->get('pembalap/printExcel', 'App\Modules\Admin\Controllers\Pembalap::printExcel');
    $routes->get('pembalap/(:segment)', 'App\Modules\Admin\Controllers\Pembalap::detail/$1');
    // $routes->delete('pembalap/(:num)', 'App\Modules\Admin\Controllers\Pembalap::hapus/$1');
    $routes->get('team', 'App\Modules\Admin\Controllers\Team::index');
    $routes->get('team/edit/(:segment)', 'App\Modules\Admin\Controllers\Team::edit/$1');
    $routes->add('team/(:any)', 'App\Modules\Admin\Controllers\Team::$1');
    $routes->get('team/(:num)', 'App\Modules\Admin\Controllers\Team::hapus/$1');
    // $routes->delete('team/(:num)', 'App\Modules\Admin\Controllers\Team::hapus/$1');
    $routes->get('user', 'App\Modules\Admin\Controllers\User');
    $routes->get('user/edit/(:segment)', 'App\Modules\Admin\Controllers\User::edit/$1');
    $routes->add('user/(:any)', 'App\Modules\Admin\Controllers\User::$1');
    $routes->get('user/(:num)', 'App\Modules\Admin\Controllers\User::hapus/$1');
    // $routes->delete('user/(:num)', 'App\Modules\Admin\Controllers\User::hapus/$1');
});

$routes->group('user', function ($routes) {
    $routes->get('dashboard', 'App\Modules\Users\Controllers\Dashboard::index');
    $routes->get('pembalap', 'App\Modules\Users\Controllers\Pembalap');
    $routes->get('pembalap/(:segment)', 'App\Modules\Users\Controllers\Pembalap::detail/$1');
    $routes->get('team', 'App\Modules\Users\Controllers\Team');
});

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
