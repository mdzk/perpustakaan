<?php

namespace Config;

use App\Controllers\Article;

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
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/donate', 'Home::donate', ['as' => 'donate']);
$routes->get('/article', 'Home::article', ['as' => 'home-article']);
$routes->get('/article/(:segment)', 'Home::detail/$1', ['as' => 'home-article-detail']);
$routes->get('/search/(:segment)', 'Home::search/$1', ['as' => 'home-article-search']);
$routes->post('/proses', 'Home::proses');

$routes->get('/gethosting', 'Home::hosting', ['as' => 'home-hosting']);

$routes->get('/admin', 'Admin::index', ['as' => 'home', 'filter' => 'auth']);
$routes->get('/admin/statistic', 'Admin::statistic', ['as' => 'statistic-lab']);

// Setting Section
$routes->get('/admin/setting', 'Setting::index', ['as' => 'setting', 'filter' => 'auth']);
$routes->post('/admin/setting/update', 'Setting::update', ['as' => 'setting-update', 'filter' => 'auth']);

// Management Users Section
$routes->get('/admin/users', 'Users::index', ['as' => 'users', 'filter' => 'auth:admin']);
$routes->post('/admin/users/add', 'Users::add', ['as' => 'users-add', 'filter' => 'auth']);
$routes->post('/admin/users/delete', 'Users::delete', ['as' => 'users-delete', 'filter' => 'auth']);
$routes->post('/admin/users/update', 'Users::update', ['as' => 'users-update', 'filter' => 'auth']);

// Article Section
$routes->get('/admin/article', 'Article::index', ['as' => 'article', 'filter' => 'auth']);
$routes->get('/admin/article/add', 'Article::add', ['as' => 'article-add', 'filter' => 'auth']);
$routes->post('/admin/article/save', 'Article::save', ['as' => 'article-save', 'filter' => 'auth']);
$routes->post('/admin/article/delete', 'Article::delete', ['as' => 'article-delete', 'filter' => 'auth']);
$routes->get('/admin/article/edit/(:num)', 'Article::edit/$1', ['as' => 'article-edit', 'filter' => 'auth']);
$routes->post('/admin/article/update', 'Article::update', ['as' => 'article-update', 'filter' => 'auth']);

// Category Section
$routes->get('/admin/category', 'Category::index', ['as' => 'category', 'filter' => 'auth']);
$routes->post('/admin/category/save', 'Category::save', ['as' => 'category-save', 'filter' => 'auth']);
$routes->post('/admin/category/delete', 'Category::delete', ['as' => 'category-delete', 'filter' => 'auth']);
$routes->post('/admin/category/update', 'Category::update', ['as' => 'category-update', 'filter' => 'auth']);

// Authentication Section
$routes->get('/login', 'Auth::index', ['as' => 'login']);
$routes->post('/login/auth', 'Auth::auth', ['as' => 'auth']);
$routes->get('/logout', 'Auth::logout', ['as' => 'logout']);

// Opac Section
$routes->get('/opac', 'Opac::index', ['as' => 'opac']);
$routes->post('/opac/proses', 'Opac::proses');
$routes->get('/opac/search/(:segment)/(:segment)/(:segment)/(:segment)/(:segment)/(:segment)/(:segment)', 'Opac::search/$1/$2/$3/$4/$5/$6/$7', ['as' => 'home-opac-search']);

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
