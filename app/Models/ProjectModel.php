<?php
namespace App\Models;

use PDO;

class ProjectModel {
    private $conn;
    private $table_name = "projects";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        if ($this->conn === null) {
            return [];
        }
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC";
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
            $query = "UPDATE " . $this->table_name . " SET title = :title, category = :category, image_url = :image_url, description = :description, project_url = :project_url WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $data['id']);
        } else {
            $query = "INSERT INTO " . $this->table_name . " (title, category, image_url, description, project_url) VALUES (:title, :category, :image_url, :description, :project_url)";
            $stmt = $this->conn->prepare($query);
        }

        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':category', $data['category']);
        $stmt->bindParam(':image_url', $data['image_url']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':project_url', $data['project_url']);

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
