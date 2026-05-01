<?php
namespace App\Controllers;

require_once __DIR__ . '/../models/User_model.php';

class AuthController {
    
    public function index() {
        require_once __DIR__ . '/../views/landing/register.php';
    }

    public function login() {
        require_once __DIR__ . '/../views/landing/login.php';
    }

    public function handleSignUp() {
        // PASTIKAN TIDAK ADA echo/var_dump/die DI SINI
        
        $userModel = new \User_model(); 
        $result = $userModel->register($_POST);

        if ($result === "success") {
            header("Location: /login");
            exit;
        } else {
            // Tampilkan error jika gagal masuk database
            die("Gagal simpan ke database! Alasan: " . $result);
        }
    }
}