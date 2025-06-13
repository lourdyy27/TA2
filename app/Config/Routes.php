<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default landing page
$routes->get('/', 'AuthController::showLogin');

// Auth Routes
$routes->get('login', 'AuthController::showLogin');
$routes->post('login', 'AuthController::login');
$routes->get('register', 'AuthController::showRegister');
$routes->post('register', 'AuthController::register');
$routes->get('logout', 'AuthController::logout');

// Task Routes (for regular users)
$routes->get('tasks', 'TaskController::index');
$routes->get('tasks/create', 'TaskController::create');
$routes->post('tasks/store', 'TaskController::store');
$routes->get('tasks/edit/(:num)', 'TaskController::edit/$1');
$routes->post('tasks/update/(:num)', 'TaskController::update/$1');
$routes->get('tasks/delete/(:num)', 'TaskController::delete/$1');
$routes->get('tasks/view/(:num)', 'TaskController::view/$1');

// Admin Panel Routes
$routes->get('admin/dashboard', 'TaskController::adminDashboard');
$routes->get('admin/user-tasks/(:num)', 'TaskController::adminUserTasks/$1');
$routes->get('admin/user-tasks/edit/(:num)', 'TaskController::adminEditTask/$1');
$routes->post('admin/user-tasks/update/(:num)', 'TaskController::adminUpdateTask/$1');

// API Routes (Postman / REST)
$routes->group('api', function($routes) {
    $routes->get('tasks', 'API\TaskAPI::index');              // GET all tasks or ?user_id=1
    $routes->post('tasks', 'API\TaskAPI::create');            // POST a new task
    $routes->put('tasks/(:num)', 'API\TaskAPI::update/$1');   // PUT update
    $routes->delete('tasks/(:num)', 'API\TaskAPI::delete/$1');// DELETE
});
