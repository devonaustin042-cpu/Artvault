<?php
require_once __DIR__ . '/../core/Database.php';

class User_model extends Database {
    
    public function register($data) {
        if ($data['password'] !== $data['confirm_password']) {
            return "password_mismatch";
        }

        try {
            $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
            
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

    public function getAllUsers() {
        $stmt = $this->dbh->prepare("SELECT * FROM users ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $stmt = $this->dbh->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($data) {
        $stmt = $this->dbh->prepare("UPDATE users SET full_name = :full_name, email = :email, role = :role WHERE id = :id");
        $stmt->bindParam(':full_name', $data['full_name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':role', $data['role']);
        $stmt->bindParam(':id', $data['id']);
        return $stmt->execute();
    }

    public function deleteUser($id) {
        $stmt = $this->dbh->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}