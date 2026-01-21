<?php
namespace Models;

use PDO;

class StatsModel {
    private $conn;
    private $table_name = "stats";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        if ($this->conn === null) {
            return [];
        }
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY display_order ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
