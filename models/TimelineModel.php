<?php
namespace Models;

use PDO;

class TimelineModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        if ($this->conn === null) return [];
        $query = "SELECT * FROM timeline ORDER BY display_order ASC, created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        if ($this->conn === null) return null;
        $query = "SELECT * FROM timeline WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save($data) {
        if ($this->conn === null) return false;

        if (isset($data['id']) && !empty($data['id'])) {
            $query = "UPDATE timeline SET title = :title, organization = :organization, period = :period, description = :description, category = :category, display_order = :display_order WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $data['id']);
        } else {
            $query = "INSERT INTO timeline (title, organization, period, description, category, display_order) VALUES (:title, :organization, :period, :description, :category, :display_order)";
            $stmt = $this->conn->prepare($query);
        }

        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':organization', $data['organization']);
        $stmt->bindParam(':period', $data['period']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':category', $data['category']);
        $stmt->bindParam(':display_order', $data['display_order']);

        return $stmt->execute();
    }

    public function delete($id) {
        if ($this->conn === null) return false;
        $query = "DELETE FROM timeline WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
