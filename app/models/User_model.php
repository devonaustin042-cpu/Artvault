<?php
require_once __DIR__ . '/../core/Database.php';

class User_model extends Database {
    
    public function register($data) {
        if ($data['password'] !== $data['confirm_password']) {
            return "password_mismatch";
        }

        try {
            $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
            $role = (strpos($data['email'], '.sch.id') !== false) ? 'author' : 'viewer';

            $query = "INSERT INTO users (nama_lengkap, email, password, role) VALUES (:nama_lengkap, :email, :password, :role)";
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':nama_lengkap', $data['nama_lengkap']);
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
}