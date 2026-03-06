<?php
require_once __DIR__ . '/../app/core/Router.php';

use App\Core\Router;

$router = new Router();

$router->add('GET', '/', 'ArtController', 'home');
$router->add('GET', '/gallery', 'ArtController', 'gallery');
$router->add('GET', '/about', 'ArtController', 'about');
$router->add('GET', '/contact', 'ArtController', 'contact');

$router->run();
?>