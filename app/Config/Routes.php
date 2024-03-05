<?php

use App\Controllers\MahasiswaController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/mahasiswa', 'MahasiswaController::index');
$routes->post('/mahasiswa', 'MahasiswaController::index');
$routes->get('/mahasiswa/create', 'MahasiswaController::create');
$routes->get('/mahasiswa/(:segment)', 'MahasiswaController::detail/$1');
$routes->post('/mahasiswa/save', 'MahasiswaController::save');
$routes->delete('/mahasiswa/(:segment)', 'MahasiswaController::delete/$1');
$routes->get('/mahasiswa/edit/(:segment)', 'MahasiswaController::edit/$1');
$routes->post('/mahasiswa/update/(:segment)', 'MahasiswaController::update/$1');
