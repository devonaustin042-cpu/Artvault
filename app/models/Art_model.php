<?php
require_once __DIR__ . '/../core/Database.php';

class Art_model extends Database {
    
    public function getAllArtworks($categoryId = null) {
        $query = "SELECT artworks.*, users.full_name as author_name,
                  (SELECT COUNT(*) FROM likes WHERE artwork_id = artworks.id) as like_count
                  FROM artworks 
                  LEFT JOIN users ON artworks.user_id = users.id";
        
        if ($categoryId) {
            $query .= " WHERE artworks.category_id = :category_id";
        }
        
        $query .= " ORDER BY artworks.upload_time DESC";
        
        $stmt = $this->dbh->prepare($query);
        
        if ($categoryId) {
            $stmt->bindParam(':category_id', $categoryId);
        }
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArtworkById($id) {
        $query = "SELECT artworks.*, users.full_name as author_name,
                  (SELECT COUNT(*) FROM likes WHERE artwork_id = artworks.id) as like_count
                  FROM artworks 
                  LEFT JOIN users ON artworks.user_id = users.id 
                  WHERE artworks.id = :id";
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function isLikedByUser($artworkId, $userId) {
        $query = "SELECT COUNT(*) FROM likes WHERE artwork_id = :artwork_id AND user_id = :user_id";
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':artwork_id', $artworkId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function toggleLike($artworkId, $userId) {
        if ($this->isLikedByUser($artworkId, $userId)) {
            $query = "DELETE FROM likes WHERE artwork_id = :artwork_id AND user_id = :user_id";
            $status = 'unliked';
        } else {
            $query = "INSERT INTO likes (artwork_id, user_id) VALUES (:artwork_id, :user_id)";
            $status = 'liked';
        }
        
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':artwork_id', $artworkId);
        $stmt->bindParam(':user_id', $userId);
        
        if ($stmt->execute()) {
            return $status;
        }
        return false;
    }

    public function getCategories() {
        $query = "SELECT * FROM categories ORDER BY category_name ASC";
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addArtwork($data) {
        $query = "INSERT INTO artworks (user_id, category_id, title, description, file_path) 
                  VALUES (:user_id, :category_id, :title, :description, :file_path)";
        $stmt = $this->dbh->prepare($query);
        
        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':category_id', $data['category_id']);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':file_path', $data['file_path']);
        
        return $stmt->execute();
    }

    public function updateArtwork($id, $data) {
        $query = "UPDATE artworks SET title = :title, description = :description, category_id = :category_id";
        
        if (isset($data['file_path'])) {
            $query .= ", file_path = :file_path";
        }
        
        $query .= " WHERE id = :id";
        
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':category_id', $data['category_id']);
        $stmt->bindParam(':id', $id);
        
        if (isset($data['file_path'])) {
            $stmt->bindParam(':file_path', $data['file_path']);
        }
        
        return $stmt->execute();
    }

    public function deleteArtwork($id) {
        $query = "DELETE FROM artworks WHERE id = :id";
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getOtherArtworks($excludeId, $limit = 4) {
        $query = "SELECT artworks.*, users.full_name as author_name 
                  FROM artworks 
                  LEFT JOIN users ON artworks.user_id = users.id 
                  WHERE artworks.id != :excludeId 
                  ORDER BY RAND() 
                  LIMIT :limit";
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':excludeId', $excludeId);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCommentsByArtworkId($artworkId) {
        $query = "SELECT comments.*, users.full_name as user_name 
                  FROM comments 
                  JOIN users ON comments.user_id = users.id 
                  WHERE comments.artwork_id = :artwork_id 
                  ORDER BY comments.created_at DESC";
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':artwork_id', $artworkId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addComment($data) {
        $query = "INSERT INTO comments (artwork_id, user_id, comment_text) 
                  VALUES (:artwork_id, :user_id, :comment_text)";
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':artwork_id', $data['artwork_id']);
        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':comment_text', $data['comment_text']);
        return $stmt->execute();
    }
}