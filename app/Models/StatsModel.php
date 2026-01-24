<?php
namespace App\Models;

use PDO;

class StatsModel {
    private $conn;
    private $table_name = "stats";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getSummary() {
        $stats = [];
        
        // Projects count
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM projects");
        $stmt->execute();
        $stats['projects_count'] = $stmt->fetchColumn();

        // Messages count (total and recent)
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM messages");
        $stmt->execute();
        $stats['messages_count'] = $stmt->fetchColumn();

        // Veille articles
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM veille");
        $stmt->execute();
        $stats['veille_count'] = $stmt->fetchColumn();

        // Audit Logs (failures)
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM audit_logs WHERE action LIKE '%FAILURE%' OR action LIKE '%INVALID%'");
        $stmt->execute();
        $stats['security_alerts'] = $stmt->fetchColumn();

        return $stats;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY display_order ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
