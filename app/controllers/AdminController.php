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
        header('Location: /admin/users');
        exit;
    }

    public function postEditUser($id) {
        $allowedRoles = ['viewer', 'author', 'admin'];
        $role = in_array($_POST['role'] ?? '', $allowedRoles, true) ? $_POST['role'] : 'viewer';

        $data = [
            'id' => $id,
            'full_name' => trim($_POST['full_name'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'student_id' => trim($_POST['student_id'] ?? ''),
            'role' => $role
        ];
        if ($this->userModel->updateUser($data)) {
            header('Location: /admin/users');
            exit;
        } else {
            echo "Update failed";
        }
    }

    public function deleteUser($id) {
        if ($this->userModel->deleteUser($id)) {
            header('Location: /admin/users');
            exit;
        } else {
            echo "Failed to delete user.";
        }
    }

    // Artwork Management
    public function artworks() {
        $data['artworks'] = $this->artModel->getAllArtworks();
        $data['categories'] = $this->artModel->getCategories();
        require_once __DIR__ . '/../views/admin/artworks/index.php';
    }

    public function editArtwork($id) {
        header('Location: /admin/artworks');
        exit;
    }

    public function postEditArtwork($id) {
        $art = $this->artModel->getArtworkById($id);
        if (!$art) {
            die("Artwork not found");
        }

        $data = [
            'title' => trim($_POST['title'] ?? ''),
            'description' => trim($_POST['description'] ?? ''),
            'category_id' => $_POST['category_id'] ?? null
        ];

        if (isset($_FILES['art_image']) && $_FILES['art_image']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['art_image'];
            $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png'];

            if (in_array($fileExt, $allowed, true)) {
                $newFileName = uniqid('', true) . "." . $fileExt;
                $fileDestination = __DIR__ . '/../../public/assets/gallery/' . $newFileName;

                if (move_uploaded_file($file['tmp_name'], $fileDestination)) {
                    $oldFilePath = __DIR__ . '/../../public/assets/gallery/' . $art['file_path'];
                    if (!empty($art['file_path']) && file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                    $data['file_path'] = $newFileName;
                }
            }
        }

        if ($this->artModel->updateArtwork($id, $data)) {
            header('Location: /admin/artworks');
            exit;
        } else {
            echo "Update failed";
        }
    }

    public function deleteArtwork($id) {
        if ($this->artModel->deleteArtwork($id)) {
            header('Location: /admin/artworks');
            exit;
        } else {
            echo "Failed to delete artwork.";
        }
    }
}
