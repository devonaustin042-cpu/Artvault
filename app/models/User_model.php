<?php
require_once __DIR__ . '/../core/Database.php';

class User_model extends Database {
    private const ADMIN_NAME = 'Flazened Admin';
    private const ADMIN_EMAIL = 'flazened@ski.sch.id';
    private const ADMIN_PASSWORD = 'admin123';
    
    public function register($data) {
        if ($data['password'] !== $data['confirm_password']) {
            return "password_mismatch";
        }

        try {
            $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
            
            // Classification: Strictly only @ski.sch.id are authors. 
            // gmail.com and other domains are viewers.
            $is_author = (strpos($data['email'], '@ski.sch.id') !== false);
            $role = $is_author ? 'author' : 'viewer';

            $query = "INSERT INTO users (full_name, email, password, role) VALUES (:full_name, :email, :password, :role)";
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':full_name', $data['full_name']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':role', $role);

            if ($stmt->execute()) {
                return "success";
            } else {
                return "failed_execute";
            }

        } catch (PDOException $e) {
            return "PDO_Error: " . $e->getMessage();
        }
    }
    
    public function login($data) {
    try {
            $stmt = $this->dbh->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $data['email']);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user || !password_verify($data['password'], $user['password'])) {
                return false;
            }

            return $user;

        } catch (PDOException $e) {
            return false;
        }
}

    public function ensureAdminAccount() {
        try {
            $hashedPassword = password_hash(self::ADMIN_PASSWORD, PASSWORD_DEFAULT);
            $role = 'author';

            $query = "INSERT INTO users (full_name, email, password, role)
                      VALUES (:full_name, :email, :password, :role)
                      ON DUPLICATE KEY UPDATE
                        full_name = VALUES(full_name),
                        password = VALUES(password),
                        role = VALUES(role)";

            $stmt = $this->dbh->prepare($query);
            $stmt->bindValue(':full_name', self::ADMIN_NAME);
            $stmt->bindValue(':email', self::ADMIN_EMAIL);
            $stmt->bindValue(':password', $hashedPassword);
            $stmt->bindValue(':role', $role);

            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
} 
