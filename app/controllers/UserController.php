<?php
namespace App\Controllers;

require_once __DIR__ . '/../models/User_model.php';
require_once __DIR__ . '/../models/Art_model.php';

class UserController {

    public function profile($id = null)
    {
        if ($id === null) {
            if (isset($_SESSION['user_id'])) {
                $id = $_SESSION['user_id'];
            } else {
                header('Location: /login');
                exit;
            }
        }

        $userModel = new \User_model();
        $artModel = new \Art_model();

        $user = $userModel->getUserById($id);
        if (!$user) {
            die("User tidak ditemukan!");
        }

        $tags = $userModel->getUserTags($id);
        $stats = $userModel->getFollowStats($id);
        
        $userArtworks = $artModel->getUserArtworks($id);
        $favorites = $artModel->getUserFavorites($id);
        
        $isFollowing = false;
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != $id) {
            $isFollowing = $userModel->isFollowing($_SESSION['user_id'], $id);
        }

        require_once __DIR__ . '/../views/landing/profile.php';
    }

    public function toggleFollow($followingId)
    {
        header('Content-Type: application/json');
        
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['status' => 'error', 'message' => 'Please login to follow users.']);
            exit;
        }

        $followerId = $_SESSION['user_id'];
        if ($followerId == $followingId) {
            echo json_encode(['status' => 'error', 'message' => 'You cannot follow yourself.']);
            exit;
        }

        $userModel = new \User_model();
        $status = $userModel->toggleFollow($followerId, $followingId);
        
        if ($status) {
            $stats = $userModel->getFollowStats($followingId);
            echo json_encode(['status' => 'success', 'follow_status' => $status, 'follower_count' => $stats['followers']]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to toggle follow.']);
        }
        exit;
    }

    public function updateAvatar()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
                $file = $_FILES['avatar'];
                $fileName = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = ['jpg', 'jpeg', 'png'];

                if (in_array($fileActualExt, $allowed)) {
                    $newFileName = "avatar_" . $_SESSION['user_id'] . "_" . uniqid() . "." . $fileActualExt;
                    $fileDestination = __DIR__ . '/../../public/assets/users/' . $newFileName;

                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        $userModel = new \User_model();
                        if ($userModel->updateAvatar($_SESSION['user_id'], $newFileName)) {
                            // Update session if we want to use it elsewhere
                            $_SESSION['user_avatar'] = $newFileName;
                            header('Location: /profile');
                            exit;
                        }
                    }
                }
            }
        }
        header('Location: /profile');
    }

    public function updateBanner()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['banner']) && $_FILES['banner']['error'] === 0) {
                $file = $_FILES['banner'];
                $fileName = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = ['jpg', 'jpeg', 'png'];

                if (in_array($fileActualExt, $allowed)) {
                    $newFileName = "banner_" . $_SESSION['user_id'] . "_" . uniqid() . "." . $fileActualExt;
                    $fileDestination = __DIR__ . '/../../public/assets/users/' . $newFileName;

                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        $userModel = new \User_model();
                        if ($userModel->updateBanner($_SESSION['user_id'], $newFileName)) {
                            $_SESSION['user_banner'] = $newFileName;
                            header('Location: /profile');
                            exit;
                        }
                    }
                }
            }
        }
        header('Location: /profile');
    }

    public function updateName()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newName = $_POST['full_name'] ?? '';
            if (!empty(trim($newName))) {
                $userModel = new \User_model();
                // We need a specific method to update just the name or use the existing updateUser
                // Let's check User_model::updateUser
                $user = $userModel->getUserById($_SESSION['user_id']);
                $data = [
                    'id' => $_SESSION['user_id'],
                    'full_name' => $newName,
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'student_id' => $user['student_id']
                ];
                if ($userModel->updateUser($data)) {
                    $_SESSION['user_name'] = $newName;
                }
            }
        }
        header('Location: /profile');
    }
}
