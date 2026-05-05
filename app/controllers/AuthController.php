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
        $userModel = new \User_model();
        $result = $userModel->login($_POST);

        if ($result === false) {
            header("Location: /login?error=invalid_credentials");
            exit;
        }

        // Hard Classification: Force gmail.com to viewer, even if DB says otherwise
        $role = $result['role'];
        if (strpos($result['email'], '@gmail.com') !== false) {
            $role = 'viewer';
        }

        $_SESSION['user_id']   = $result['id'];
        $_SESSION['user_name'] = $result['nama_lengkap'];
        $_SESSION['user_role'] = $role;

        header("Location: /");
        exit;
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: /");
        exit;
    }
}