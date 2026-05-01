<?php
namespace App\Controllers;

class ArtController {

    public function gallery()
    {
        require_once __DIR__ . '/../views/landing/gallery.php';
    }

    public function detail($id)
    {
        require_once __DIR__ . '/../views/landing/detail.php';
    }


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
