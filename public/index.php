<?php
if (!is_writable(session_save_path())) {
    $sessionPath = sys_get_temp_dir() . '/artvault_sessions';

    if (!is_dir($sessionPath)) {
        mkdir($sessionPath, 0777, true);
    }

    session_save_path($sessionPath);
}

session_start();
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

// Author Routes
$router->add('GET', '/author/gallery', 'ArtController', 'gallery');
$router->add('GET', '/author/art/{id}', 'ArtController', 'detail');
$router->add('GET', '/author/home', 'HomeController', 'index');

// Auth Routes
$router->add('GET', '/login', 'AuthController', 'login');
$router->add('GET', '/register', 'AuthController', 'index');        
$router->add('POST', '/post-register', 'AuthController', 'handleSignUp');
$router->add('POST', '/post-login', 'AuthController', 'handleLogin');
$router->add('GET', '/logout', 'AuthController', 'logout');

$router->run();
?>
