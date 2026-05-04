<?php
namespace App\Controllers;

require_once __DIR__ . '/../models/Art_model.php';

class ArtController {

    public function gallery()
    {
        $artModel = new \Art_model();
        $artworks = $artModel->getAllArtworks();
        require_once __DIR__ . '/../views/landing/gallery.php';
    }

    public function detail($id)
    {
        $artModel = new \Art_model();
        $art = $artModel->getArtworkById($id);

        if (!$art) {
            die("Karya tidak ditemukan!");
        }

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
