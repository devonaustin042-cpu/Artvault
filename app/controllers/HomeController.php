<?php
namespace App\Controllers;

require_once __DIR__ . '/../models/Art.php';

use App\Models\Art;

class HomeController {
    public function index()
    {
        require_once __DIR__ . '/../views/landing/home.php';
    }

    public function about()
    {
        $artModel = new Art();
        // Fetch 4 artworks to showcase
        $artworks = array_slice($artModel->getAllArtworks(), 0, 4);
        
        require_once __DIR__ . '/../views/landing/about.php';
    }

    public function contact()
    {
        require_once __DIR__ . '/../views/landing/contact.php';
    }
}

