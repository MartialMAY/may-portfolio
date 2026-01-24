<?php
namespace Models;

use PDO;

class MessageModel {
    private $conn;
    private $table_name = "messages";

    public $id;
    public $name;
    public $email;
    public $message;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                SET name=:name, email=:email, message=:message";

        $stmt = $this->conn->prepare($query);

        // Clean data - No htmlspecialchars here (should be done on output)
        $this->name = strip_tags($this->name);
        $this->email = strip_tags($this->email);
        $this->message = strip_tags($this->message);

        // Bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":message", $this->message);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
