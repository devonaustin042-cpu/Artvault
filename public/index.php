<?php
require_once __DIR__ . '/../app/core/Router.php';

use App\Core\Router;

$router = new Router();

$router->add('GET', '/', 'HomeController', 'index');
$router->add('GET', '/about', 'HomeController', 'about');
$router->add('GET', '/contact', 'HomeController', 'contact');

$router->add('GET', '/gallery', 'ArtController', 'index');
$router->add('GET', '/gallery/{id}', 'ArtController', 'show');

$router->add('GET', '/author/gallery/{id}', 'AuthorController', 'gallery');
$router->add('GET', '/author/detail/{id}', 'AuthorController', 'detail');

$router->run();
?>