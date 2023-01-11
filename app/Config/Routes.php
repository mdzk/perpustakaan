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
$routes->get('/article', 'Home::article', ['as' => 'home-article']);
$routes->get('/article/(:segment)', 'Home::detail/$1', ['as' => 'home-article-detail']);
$routes->get('/search/(:segment)', 'Home::search/$1', ['as' => 'home-article-search']);
$routes->post('/proses', 'Home::proses');

$routes->get('/gethosting', 'Home::hosting', ['as' => 'home-hosting']);
$routes->get('/materials', 'Home::materials', ['as' => 'home-materials']);
$routes->get('/materials/videos', 'Home::materialsVideos');
$routes->get('/materials/documents', 'Home::materialsDocuments');

$routes->get('/donate', 'Home::donate', ['as' => 'home-donate']);
$routes->post('/donate/update', 'Home::donateUpdate', ['as' => 'home-donate-update']);
$routes->post('/donate/add', 'Home::donateAdd', ['as' => 'home-donate-add']);


$routes->get('/admin', 'Admin::index', ['as' => 'home', 'filter' => 'auth']);
$routes->get('/admin/statistic', 'Admin::statistic', ['as' => 'statistic-lab']);

// Setting Section
$routes->get('/admin/setting', 'Setting::index', ['as' => 'setting', 'filter' => 'auth']);
$routes->post('/admin/setting/update', 'Setting::update', ['as' => 'setting-update', 'filter' => 'auth']);

// Management Users Section
$routes->get('/admin/users', 'Users::index', ['as' => 'users', 'filter' => 'auth:admin']);
$routes->post('/admin/users/add', 'Users::add', ['as' => 'users-add', 'filter' => 'auth:admin']);
$routes->post('/admin/users/delete', 'Users::delete', ['as' => 'users-delete', 'filter' => 'auth:admin']);
$routes->post('/admin/users/update', 'Users::update', ['as' => 'users-update', 'filter' => 'auth:admin']);

// Article Section
$routes->get('/admin/article', 'Article::index', ['as' => 'article', 'filter' => 'auth:staff']);
$routes->get('/admin/article/add', 'Article::add', ['as' => 'article-add', 'filter' => 'auth:staff']);
$routes->post('/admin/article/save', 'Article::save', ['as' => 'article-save', 'filter' => 'auth:staff']);
$routes->post('/admin/article/delete', 'Article::delete', ['as' => 'article-delete', 'filter' => 'auth:staff']);
$routes->get('/admin/article/edit/(:num)', 'Article::edit/$1', ['as' => 'article-edit', 'filter' => 'auth:staff']);
$routes->post('/admin/article/update', 'Article::update', ['as' => 'article-update', 'filter' => 'auth:staff']);

// Category Section
$routes->get('/admin/category', 'Category::index', ['as' => 'category', 'filter' => 'auth:staff']);
$routes->post('/admin/category/save', 'Category::save', ['as' => 'category-save', 'filter' => 'auth:staff']);
$routes->post('/admin/category/delete', 'Category::delete', ['as' => 'category-delete', 'filter' => 'auth:staff']);
$routes->post('/admin/category/update', 'Category::update', ['as' => 'category-update', 'filter' => 'auth:staff']);

// Prodi Section
$routes->get('/admin/prodi', 'Prodi::index', ['as' => 'prodi', 'filter' => 'auth:staff']);
$routes->post('/admin/prodi/save', 'Prodi::save', ['as' => 'prodi-save', 'filter' => 'auth:staff']);
$routes->post('/admin/prodi/delete', 'Prodi::delete', ['as' => 'prodi-delete', 'filter' => 'auth:staff']);
$routes->post('/admin/prodi/update', 'Prodi::update', ['as' => 'prodi-update', 'filter' => 'auth:staff']);

// Donate Section
$routes->get('/admin/donate', 'Donate::index', ['as' => 'donate', 'filter' => 'auth:staff']);
$routes->get('/admin/donate/history', 'Donate::history', ['as' => 'donate-history', 'filter' => 'auth:staff']);
$routes->get('/admin/donate/title', 'Donate::title', ['as' => 'donate-title', 'filter' => 'auth:staff']);
$routes->post('/admin/donate/title', 'Donate::titleVerify', ['as' => 'donate-title-verify', 'filter' => 'auth:staff']);
$routes->post('/admin/donate/save', 'Donate::save', ['as' => 'donate-save', 'filter' => 'auth:staff']);
$routes->post('/admin/donate/delete', 'Donate::delete', ['as' => 'donate-delete', 'filter' => 'auth:staff']);
$routes->post('/admin/donate/update', 'Donate::update', ['as' => 'donate-update', 'filter' => 'auth:staff']);
$routes->post('/admin/donate/verify', 'Donate::verify', ['as' => 'donate-verify', 'filter' => 'auth:staff']);

// Teaching Materials Section
$routes->get('/admin/materials', 'TeachingMaterials::index', ['as' => 'materials', 'filter' => 'auth:staff']);
$routes->post('/admin/materials/save', 'TeachingMaterials::save', ['as' => 'materials-save', 'filter' => 'auth:staff']);
$routes->post('/admin/materials/delete', 'TeachingMaterials::delete', ['as' => 'materials-delete', 'filter' => 'auth:staff']);
$routes->post('/admin/materials/update', 'TeachingMaterials::update', ['as' => 'materials-update', 'filter' => 'auth:staff']);

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
