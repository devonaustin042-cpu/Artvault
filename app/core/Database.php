<?php
// app/core/Database.php

class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "123"; // Default Laragon kosong
    private $db   = "db_gallery_sekolah"; // Sesuaikan dengan nama database kamu
    protected $dbh; // Database Handle

    public function __construct() {
        // Data Source Name
        $dsn = "mysql:host={$this->host};dbname={$this->db}";
        
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die("Koneksi Database Gagal: " . $e->getMessage());
        }
    }

    public function prepare($sql) {
        return $this->dbh->prepare($sql);
    }
}