<?php
namespace App\Controllers;

class ArtController {

    public function home()
    {
        require_once __DIR__ . '/../views/landing/home.php';
    }

    public function gallery()
    {
        require_once __DIR__ . '/../views/landing/gallery.php';
    }

    public function about()
    {
        require_once __DIR__ . '/../views/landing/about.php';
    }
    
    public function contact()
    {
        require_once __DIR__ . '/../views/landing/contact.php';
    }

    public function artDetail()
    {
        require_once __DIR__ . '/../views/main page/author/detail.php';
    }

    public function authorgallery()
    {
        require_once __DIR__ . '/../views/main page/author/gallery.php';
    }

    public function landingArtdetail()
    {
        require_once __DIR__ . '/../views/landing/detail.php';
    }
}
