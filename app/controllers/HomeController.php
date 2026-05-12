<?php
namespace App\Controllers;

class HomeController {
    public function index()
    {
        require_once __DIR__ . '/../views/landing/home.php';
    }

    public function about()
    {
        require_once __DIR__ . '/../views/landing/about.php';
    }

    public function contact()
    {
        require_once __DIR__ . '/../views/landing/contact.php';
    }
}
