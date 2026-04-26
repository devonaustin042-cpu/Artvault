<?php
namespace App\Controllers;

class ArtController {

    public function index()
    {
        require_once __DIR__ . '/../views/Landing/gallery.php';
    }

    public function show($id = null)
    {
        // $id akan digunakan nanti untuk mengambil data karya dari database
        require_once __DIR__ . '/../views/Landing/detail.php';
    }

}
