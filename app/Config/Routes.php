<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ===========================
// FRONTEND ROUTES
// ===========================
$routes->get('/', 'Home::index');
$routes->get('/profil', 'Profil::index');
$routes->get('/akademik', 'Akademik::index');
$routes->get('/pengumuman', 'Pengumuman::index');
$routes->get('/spmbm', 'Spmbm::index');
$routes->get('/spmbm/form', 'Spmbm::form');
$routes->post('/spmbm/submit', 'Spmbm::submit');
$routes->get('kontak', 'Kontak::index');
$routes->post('kontak/kirim', 'Kontak::kirim');