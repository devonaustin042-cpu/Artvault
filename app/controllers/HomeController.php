<?php
namespace App\Controllers;

class HomeController {

    public function authorGallery()
    {
        require_once __DIR__ . '/../views/author/gallery.php';
    }

    public function authorDetail($id)
    {
        require_once __DIR__ . '/../views/author/detail.php';
    }
    public function home()
    {
        require_once __DIR__ . '/../views/author/home.php';
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
