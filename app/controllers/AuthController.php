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

        $_SESSION['user_id']   = $result['id'];
        $_SESSION['user_name'] = $result['full_name'];
        $_SESSION['user_email'] = $result['email'];
        
        $role = $result['role'];
        
        // Special redirect for Flazened or Admin role
        if ($result['email'] === 'flazened@ski.sch.id' || $role === 'admin') {
            $_SESSION['user_role'] = 'admin';
            header("Location: /admin");
            exit;
        }

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
