<?php
namespace App\Models;

use PDO;

class VeilleModel {
    private $conn;
    private $table_name = "veille";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        if ($this->conn === null) {
            return [];
        }
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY published_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        if ($this->conn === null) return null;
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save($data) {
        if ($this->conn === null) return false;

        if (isset($data['id']) && !empty($data['id'])) {
            $query = "UPDATE " . $this->table_name . " SET title = :title, category = :category, source_name = :source_name, image_url = :image_url, article_url = :article_url, summary = :summary, opinion = :opinion, published_at = :published_at WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $data['id']);
        } else {
            $query = "INSERT INTO " . $this->table_name . " (title, category, source_name, image_url, article_url, summary, opinion, published_at) VALUES (:title, :category, :source_name, :image_url, :article_url, :summary, :opinion, :published_at)";
            $stmt = $this->conn->prepare($query);
        }

        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':category', $data['category']);
        $stmt->bindParam(':source_name', $data['source_name']);
        $stmt->bindParam(':image_url', $data['image_url']);
        $stmt->bindParam(':article_url', $data['article_url']);
        $stmt->bindParam(':summary', $data['summary']);
        $stmt->bindParam(':opinion', $data['opinion']);
        $stmt->bindParam(':published_at', $data['published_at']);

        return $stmt->execute();
    }

    public function delete($id) {
        if ($this->conn === null) return false;
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
