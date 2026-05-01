<?php
require_once __DIR__ . '/../app/core/Router.php';

use App\Core\Router;

$router = new Router();

// Home / Landing Routes
$router->add('GET', '/', 'HomeController', 'index');
$router->add('GET', '/about', 'HomeController', 'about');
$router->add('GET', '/contact', 'HomeController', 'contact');

// Gallery Routes
$router->add('GET', '/gallery', 'ArtController', 'gallery');
$router->add('GET', '/art/{id}', 'ArtController', 'detail');

// Author Routes
$router->add('GET', '/author/gallery', 'ArtController', 'authorGallery');
$router->add('GET', '/author/art/{id}', 'ArtController', 'authorDetail');

// Auth Routes
$router->add('GET', '/login', 'AuthController', 'login');
$router->add('GET', '/register', 'AuthController', 'index');        
$router->add('POST', '/post-register', 'AuthController', 'handleSignUp');
$router->add('POST', '/post-login', 'AuthController', 'handleLogin');

$router->run();
?>
