<?php
namespace App\Services;

use App\Core\Database;
use PDO;

class LoggerService {
    private $db;
    private $logFile;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->logFile = __DIR__ . '/../../storage/logs/security.log';
        
        // Ensure log directory exists
        $logDir = dirname($this->logFile);
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }
    }

    /**
     * Log an action to both DB and File.
     */
    public function log($action, $module, $details = null) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['admin_id'] ?? null;
        $username = $_SESSION['admin'] ?? 'Guest';
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
        $ua = $_SERVER['HTTP_USER_AGENT'] ?? 'UNKNOWN';

        // 1. Log to Database
        try {
            $query = "INSERT INTO audit_logs (user_id, username, action, module, details, ip_address, user_agent) 
                      VALUES (:user_id, :username, :action, :module, :details, :ip, :ua)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':user_id' => $user_id,
                ':username' => $username,
                ':action' => $action,
                ':module' => $module,
                ':details' => $details,
                ':ip' => $ip,
                ':ua' => $ua
            ]);
        } catch (\PDOException $e) {
            // If DB fails, we still want to log to file
            $this->logToFile("DATABASE_LOG_ERROR: " . $e->getMessage());
        }

        // 2. Log to File
        $timestamp = date('Y-m-d H:i:s');
        $fileEntry = "[$timestamp] IP: $ip | User: $username | Action: $action | Module: $module | Details: $details" . PHP_EOL;
        $this->logToFile($fileEntry);
    }

    private function logToFile($message) {
        file_put_contents($this->logFile, $message, FILE_APPEND);
    }
}
