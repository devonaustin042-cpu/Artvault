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

    public function authorGallery()
    {
        require_once __DIR__ . '/../views/author/gallery.php';
    }

    public function authorDetail($id)
    {
        require_once __DIR__ . '/../views/author/detail.php';
    }
}
