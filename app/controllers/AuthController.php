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
        $userModel = new \User_model(); 
        $result = $userModel->register($_POST);

        if ($result === "success") {
            header("Location: /login");
            exit;
        } else {
            die("Gagal simpan ke database! Alasan: " . $result);
        }
    }

    public function handleLogin() {
        session_start();
        
        $userModel = new \User_model();
        $result = $userModel->login($_POST);

        if ($result === false) {
            die("Login gagal: email atau password salah.");
        }

        $_SESSION['user_id']   = $result['id'];
        $_SESSION['user_name'] = $result['nama_lengkap'];
        $_SESSION['user_role'] = $result['role'];

        header("Location: /author/home");
        exit;
    }
}