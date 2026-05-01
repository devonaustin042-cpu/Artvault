<?php
namespace App\Controllers;

class AuthController {
    public function index() {
        // Karena dipanggil dari public/index.php, path ini harus tepat
        require_once __DIR__ . '/../views/landing/register.php';
    }

    public function handleSignUp() {
        $userModel = new \User_model(); 
        $result = $userModel->register($_POST);

        if ($result == "success") {
            header("Location: /login"); // Langsung ke root
        } else {
            header("Location: /register?status=" . $result);
        }
        exit;
    }
}