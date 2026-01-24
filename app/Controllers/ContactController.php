<?php
namespace App\Controllers;

use App\Core\Database;
use App\Models\MessageModel;
use App\Services\EmailService;
use App\Services\LoggerService;

class ContactController {
    public function submit() {
        ob_start(); // Buffer any output (warnings, etc)
        $logger = new LoggerService();

        // Only allow POST requests
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            ob_end_clean();
            header('Content-Type: application/json');
            http_response_code(405);
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
            return;
        }

        try {
            $database = new Database();
            $db = $database->getConnection();
            
            if (!$db) {
                ob_end_clean();
                header('Content-Type: application/json');
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Impossible d\'établir une connexion à la base de données.']);
                return;
            }
        } catch (\Exception $e) {
            ob_end_clean();
            header('Content-Type: application/json');
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Erreur de connexion : ' . $e->getMessage()]);
            return;
        }

        $messageModel = new MessageModel($db);

        // Get POST data
        $messageModel->name = $_POST['name'] ?? '';
        $messageModel->email = $_POST['email'] ?? '';
        $messageModel->message = $_POST['message'] ?? '';

        // Basic validation
        if (empty($messageModel->name) || empty($messageModel->email) || empty($messageModel->message)) {
            $logger->log('CONTACT_VAL_ERROR', 'CONTACT', "Empty fields from " . ($messageModel->email ?: 'Unknown'));
            ob_end_clean();
            header('Content-Type: application/json');
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Tous les champs sont obligatoires pour soumettre votre demande.']);
            return;
        }

        if (!filter_var($messageModel->email, FILTER_VALIDATE_EMAIL)) {
            $logger->log('CONTACT_VAL_ERROR', 'CONTACT', "Invalid email: " . $messageModel->email);
            ob_end_clean();
            header('Content-Type: application/json');
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'L\'adresse e-mail renseignée n\'est pas valide.']);
            return;
        }

        // Save to database
        try {
            if ($messageModel->create()) {
                $logger->log('CONTACT_MESSAGE_SENT', 'CONTACT', "From: " . $messageModel->name . " (" . $messageModel->email . ")");
                
                // Send Email Notification
                try {
                    $emailService = new EmailService();
                    $emailService->sendAdminNotification($messageModel->name, $messageModel->email, $messageModel->message);
                } catch (\Exception $e) {
                    $logger->log('EMAIL_SEND_ERROR', 'SERVICES', $e->getMessage());
                }

                ob_end_clean();
                header('Content-Type: application/json');
                echo json_encode(['success' => true, 'message' => 'Votre demande a été transmise avec succès.']);
            } else {
                ob_end_clean();
                header('Content-Type: application/json');
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Une erreur technique est survenue lors de l\'enregistrement.']);
            }
        } catch (\PDOException $e) {
            $logger->log('DB_ERROR', 'CONTACT', $e->getMessage());
            ob_end_clean();
            header('Content-Type: application/json');
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Erreur technique interne. L\'administration a été notifiée.']);
        }
    }
}
