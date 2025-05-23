<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', function () {
    return view('landing');
});
$routes->get('/', 'AuthController::showLogin');
$routes->get('/login', 'AuthController::showLogin');
$routes->post('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::showRegister');
$routes->post('/register', 'AuthController::register');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/tasks', 'TaskController::index');
$routes->get('/tasks/create', 'TaskController::create');
$routes->post('/tasks/store', 'TaskController::store');
$routes->get('/tasks/edit/(:num)', 'TaskController::edit/$1');
$routes->post('/tasks/update/(:num)', 'TaskController::update/$1');
$routes->get('/tasks/delete/(:num)', 'TaskController::delete/$1');
$routes->get('/', 'AuthController::login');
$routes->match(['get', 'post'], 'login', 'AuthController::login');
$routes->match(['get', 'post'], 'register', 'AuthController::register');
$routes->get('logout', 'AuthController::logout');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::loginPost'); // or whatever method handles login submission
$routes->match(['get', 'post'], 'login', 'LoginController::login');
$routes->get('logout', 'LoginController::logout');
$routes->get('tasks/view/(:num)', 'TaskController::view/$1');

