<?php
namespace App\Controllers;

class AuthorController {
    public function gallery($id = null)
    {
        // $id akan digunakan nanti untuk mengambil data author dari database
        require_once __DIR__ . '/../views/main page/author/gallery.php';
    }

    public function detail($id = null)
    {
        require_once __DIR__ . '/../views/main page/author/detail.php';
    }
}
