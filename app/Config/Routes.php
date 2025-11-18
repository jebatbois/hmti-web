<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route Login
$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');

// GROUP ADMIN (DILINDUNGI FILTER AUTH)
// Tambahkan ['filter' => 'auth'] di sini
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->get('/', 'Admin\Dashboard::index');

    // Manajemen Berita
    $routes->get('berita', 'Admin\BeritaController::index');
    $routes->get('berita/create', 'Admin\BeritaController::create');
    $routes->post('berita/store', 'Admin\BeritaController::store');
    $routes->get('berita/edit/(:num)', 'Admin\BeritaController::edit/$1');
    $routes->post('berita/update/(:num)', 'Admin\BeritaController::update/$1');
    $routes->post('berita/delete/(:num)', 'Admin\BeritaController::delete/$1');

    // Manajemen User
    $routes->get('users', 'Admin\UserController::index');
    $routes->get('users/create', 'Admin\UserController::create');
    $routes->post('users/store', 'Admin\UserController::store');
    $routes->post('users/delete/(:num)', 'Admin\UserController::delete/$1');
});



// Route Publik
$routes->get('/', 'Home::index');
$routes->get('/profil', 'Profil::index');
$routes->get('/berita', 'Berita::index');
$routes->get('/berita/(:segment)', 'Berita::detail/$1');
