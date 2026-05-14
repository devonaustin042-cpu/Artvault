<?php
if (!is_writable(session_save_path())) {
    $sessionPath = sys_get_temp_dir() . '/artvault_sessions';

    if (!is_dir($sessionPath)) {
        mkdir($sessionPath, 0777, true);
    }

    session_save_path($sessionPath);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../app/core/Router.php';

use App\Core\Router;

$router = new Router();

// Home / Landing Routes
$router->add('GET', '/', 'HomeController', 'index');
$router->add('GET', '/about', 'HomeController', 'about');
$router->add('GET', '/contact', 'HomeController', 'contact');
$router->add('GET', '/gallery', 'ArtController', 'gallery');

// Gallery Routes
$router->add('GET', '/art/{id}', 'ArtController', 'detail');
$router->add('POST', '/art/upload', 'ArtController', 'uploadArt');
$router->add('POST', '/art/update/{id}', 'ArtController', 'updateArt');
$router->add('GET', '/art/delete/{id}', 'ArtController', 'deleteArt');

// Author Routes
$router->add('GET', '/author/gallery', 'ArtController', 'gallery');
$router->add('GET', '/author/art/{id}', 'ArtController', 'detail');
$router->add('GET', '/author/home', 'HomeController', 'index');

// Admin Routes
$router->add('GET', '/admin', 'AdminController', 'index');
$router->add('GET', '/admin/users', 'AdminController', 'users');
$router->add('GET', '/admin/users/edit/{id}', 'AdminController', 'editUser');
$router->add('POST', '/admin/users/update/{id}', 'AdminController', 'postEditUser');
$router->add('GET', '/admin/users/delete/{id}', 'AdminController', 'deleteUser');
$router->add('GET', '/admin/artworks', 'AdminController', 'artworks');
$router->add('GET', '/admin/artworks/edit/{id}', 'AdminController', 'editArtwork');
$router->add('POST', '/admin/artworks/update/{id}', 'AdminController', 'postEditArtwork');
$router->add('GET', '/admin/artworks/delete/{id}', 'AdminController', 'deleteArtwork');

// Auth Routes
$router->add('GET', '/login', 'AuthController', 'login');
$router->add('GET', '/register', 'AuthController', 'index');        
$router->add('POST', '/post-register', 'AuthController', 'handleSignUp');
$router->add('POST', '/post-login', 'AuthController', 'handleLogin');
$router->add('GET', '/logout', 'AuthController', 'logout');

$router->run();
?>
