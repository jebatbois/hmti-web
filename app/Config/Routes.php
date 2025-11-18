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
    
    // Manajemen Kategori (Label)
    $routes->get('kategori', 'Admin\KategoriController::index');
    $routes->post('kategori/store', 'Admin\KategoriController::store');
    $routes->post('kategori/update/(:num)', 'Admin\KategoriController::update/$1');
    $routes->post('kategori/delete/(:num)', 'Admin\KategoriController::delete/$1');

    // CRUD PENGURUS
    $routes->get('pengurus', 'Admin\PengurusController::index');
    $routes->get('pengurus/create', 'Admin\PengurusController::create');
    $routes->post('pengurus/store', 'Admin\PengurusController::store');
    $routes->get('pengurus/edit/(:num)', 'Admin\PengurusController::edit/$1');
    $routes->post('pengurus/update/(:num)', 'Admin\PengurusController::update/$1');
    $routes->post('pengurus/delete/(:num)', 'Admin\PengurusController::delete/$1');

    // CRUD PROKER
    $routes->get('proker', 'Admin\ProkerController::index');
    $routes->get('proker/create', 'Admin\ProkerController::create');
    $routes->post('proker/store', 'Admin\ProkerController::store');
    $routes->get('proker/edit/(:num)', 'Admin\ProkerController::edit/$1');
    $routes->post('proker/update/(:num)', 'Admin\ProkerController::update/$1');
    $routes->post('proker/delete/(:num)', 'Admin\ProkerController::delete/$1');

    // CRUD INTERAKSI (Pesan & Mimbar)
    $routes->get('pesan', 'Admin\InteraksiController::pesan');
    $routes->post('pesan/delete/(:num)', 'Admin\InteraksiController::deletePesan/$1');
    $routes->get('mimbar', 'Admin\InteraksiController::mimbar');
    $routes->post('mimbar/delete/(:num)', 'Admin\InteraksiController::deleteMimbar/$1');
    
    // CRUD KOMENTAR
    $routes->get('komentar', 'Admin\InteraksiController::komentar');
    $routes->post('komentar/toggle/(:num)/(:segment)', 'Admin\InteraksiController::toggleKomentar/$1/$2');
    $routes->post('komentar/delete/(:num)', 'Admin\InteraksiController::deleteKomentar/$1');

    // Manajemen User
    $routes->get('users', 'Admin\UserController::index');
    $routes->get('users/create', 'Admin\UserController::create');
    $routes->post('users/store', 'Admin\UserController::store');
    $routes->post('users/delete/(:num)', 'Admin\UserController::delete/$1');
});

// --- ROUTES PUBLIK ---

$routes->get('/', 'Home::index');

// Profil
$routes->get('/profil', 'Profil::index');

// Berita & Komentar
$routes->get('/berita', 'Berita::index');
// PERBAIKAN DI SINI: Urutan route penting!
// Route spesifik (kirim_komentar) harus diatas route dengan placeholder (:segment)
$routes->post('/berita/kirim_komentar', 'Berita::kirimKomentar'); 
$routes->get('/berita/(:segment)', 'Berita::detail/$1');

// Proker
$routes->get('/proker', 'Proker::index');
$routes->get('/proker/(:num)', 'Proker::detail/$1');

// Kontak & Mimbar
$routes->get('/kontak', 'Interaksi::kontak');
$routes->post('/kontak/kirim', 'Interaksi::kirimKontak');
$routes->get('/mimbar', 'Interaksi::mimbar');
$routes->post('/mimbar/kirim', 'Interaksi::kirimMimbar');