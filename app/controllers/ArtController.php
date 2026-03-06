<?php
namespace App\Controllers;

class ArtController {

    public function home()
    {
        require_once __DIR__ . '/../views/Landing/home.php';
    }

    public function gallery()
    {
        require_once __DIR__ . '/../views/Landing/gallery.php';
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