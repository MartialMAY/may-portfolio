<?php
namespace Models;

use PDO;

class VeilleSourceModel {
    private $conn;
    private $table_name = "veille_sources";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        if ($this->conn === null) return [];
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY name ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save($data) {
        if ($this->conn === null) return false;
        if (isset($data['id']) && !empty($data['id'])) {
            $query = "UPDATE " . $this->table_name . " SET name = :name, url = :url WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $data['id']);
        } else {
            $query = "INSERT INTO " . $this->table_name . " (name, url) VALUES (:name, :url)";
            $stmt = $this->conn->prepare($query);
        }
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':url', $data['url']);
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
