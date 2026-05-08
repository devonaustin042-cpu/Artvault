<?php
require_once __DIR__ . '/../core/Database.php';

class Art_model extends Database {
    
    public function getAllArtworks() {
        $query = "SELECT artworks.*, users.full_name as author_name 
                  FROM artworks 
                  LEFT JOIN users ON artworks.user_id = users.id 
                  ORDER BY artworks.tanggal_upload DESC";
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArtworkById($id) {
        $query = "SELECT artworks.*, users.full_name as author_name 
                  FROM artworks 
                  LEFT JOIN users ON artworks.user_id = users.id 
                  WHERE artworks.id = :id";
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}