<?php
namespace App\Controllers;

use User_model;
use Art_model;

require_once __DIR__ . '/../models/User_model.php';
require_once __DIR__ . '/../models/Art_model.php';

class AdminController {
    private $userModel;
    private $artModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Security Check: Only Admin allowed (Based on role OR special email)
        if (!isset($_SESSION['user_id']) || 
           ($_SESSION['user_role'] !== 'admin' && $_SESSION['user_email'] !== 'flazened@ski.sch.id')) {
            header('Location: /login');
            exit;
        }

        $this->userModel = new User_model();
        $this->artModel = new Art_model();
    }

    public function index() {
        $data['title'] = 'Admin Dashboard';
        $data['total_users'] = count($this->userModel->getAllUsers());
        $data['total_artworks'] = count($this->artModel->getAllArtworks());
        
        // Fix: Changed from index.php to dashboard.php
        require_once __DIR__ . '/../views/admin/dashboard.php';
    }

    // User Management
    public function users() {
        $data['users'] = $this->userModel->getAllUsers();
        require_once __DIR__ . '/../views/admin/users/index.php';
    }

    public function editUser($id) {
        $data['user'] = $this->userModel->getUserById($id);
        if (!$data['user']) die("User not found");
        require_once __DIR__ . '/../views/admin/users/edit.php';
    }

    public function postEditUser($id) {
        $data = [
            'id' => $id,
            'full_name' => htmlspecialchars($_POST['full_name']),
            'email' => htmlspecialchars($_POST['email']),
            'role' => $_POST['role']
        ];
        if ($this->userModel->updateUser($data)) {
            header('Location: /admin/users');
        } else {
            echo "Update failed";
        }
    }

    public function deleteUser($id) {
        if ($this->userModel->deleteUser($id)) {
            header('Location: /admin/users');
        } else {
            echo "Failed to delete user.";
        }
    }

    // Artwork Management
    public function artworks() {
        $data['artworks'] = $this->artModel->getAllArtworks();
        require_once __DIR__ . '/../views/admin/artworks/index.php';
    }

    public function editArtwork($id) {
        $data['art'] = $this->artModel->getArtworkById($id);
        if (!$data['art']) die("Artwork not found");
        require_once __DIR__ . '/../views/admin/artworks/edit.php';
    }

    public function postEditArtwork($id) {
        $data = [
            'id' => $id,
            'title' => htmlspecialchars($_POST['title']),
            'description' => htmlspecialchars($_POST['description'])
        ];
        if ($this->artModel->updateArtwork($data)) {
            header('Location: /admin/artworks');
        } else {
            echo "Update failed";
        }
    }

    public function deleteArtwork($id) {
        if ($this->artModel->deleteArtwork($id)) {
            header('Location: /admin/artworks');
        } else {
            echo "Failed to delete artwork.";
        }
    }
}
