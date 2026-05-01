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

        $query = "INSERT INTO users (email, password, role) VALUES (:email, :password, :role)";
        $stmt = $this->dbh->prepare($query);
        
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
}}