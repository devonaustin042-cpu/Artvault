<?php
namespace App\Controllers;

class HomeController {
    public function index()
    {
        require_once __DIR__ . '/../views/Landing/home.php';
    }

    public function about()
    {
        require_once __DIR__ . '/../views/Landing/about.php';
    }
    
    public function contact()
    {
        require_once __DIR__ . '/../views/Landing/contact.php';
    }
}
