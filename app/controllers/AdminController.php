<?php
namespace App\Controllers;

class AdminController {
    private const ADMIN_EMAIL = 'flazened@ski.sch.id';

    public function index() {
        if (!$this->isAdmin()) {
            http_response_code(403);
            require_once __DIR__ . '/../views/landing/forbidden.php';
            return;
        }

        require_once __DIR__ . '/../views/admin/index.php';
    }

    private function isAdmin(): bool {
        return isset($_SESSION['user_email'])
            && $_SESSION['user_email'] === self::ADMIN_EMAIL;
    }
}
