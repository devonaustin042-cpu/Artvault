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
}
