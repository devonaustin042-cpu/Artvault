<?php
// app/models/User_model.php
require_once __DIR__ . '/../core/Database.php';

class User_model extends Database {
    
    public function register($data) {
        // 1. Validasi: Pastikan Password dan Confirm Password sama
        if ($data['password'] !== $data['confirm_password']) {
            return "password_mismatch";
        }

        // 2. Cek apakah email sudah terdaftar
        $checkEmail = "SELECT email FROM users WHERE email = :email";
        $this->dbh->prepare($checkEmail);
        $stmtCheck = $this->dbh->prepare($checkEmail);
        $stmtCheck->execute(['email' => $data['email']]);
        if ($stmtCheck->rowCount() > 0) {
            return "email_exists";
        }

        // 3. Hash Password (Keamanan)
        $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
        
        // 4. Logika Role: Author jika email mengandung .sch.id, selain itu Viewer
        $role = (strpos($data['email'], '.sch.id') !== false) ? 'author' : 'viewer';

        // 5. Query Insert
        $query = "INSERT INTO users (email, password, role) VALUES (:email, :password, :role)";
        $stmt = $this->dbh->prepare($query);
        
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':role', $role);

        if ($stmt->execute()) {
            return "success";
        } else {
            return "failed";
        }
    }
}