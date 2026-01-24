<?php
namespace Controllers;

use Config\Database;
use Models\MessageModel;
use Services\EmailService;

class ContactController {
    public function submit() {
        ob_start(); // Buffer any output (warnings, etc)
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
            ob_end_clean();
            header('Content-Type: application/json');
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Veuillez remplir tous les champs.']);
            return;
        }

        if (!filter_var($messageModel->email, FILTER_VALIDATE_EMAIL)) {
            ob_end_clean();
            header('Content-Type: application/json');
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Adresse email invalide.']);
            return;
        }

        // Save to database
        try {
            if ($messageModel->create()) {
                // Send Email Notification - Wrap in try to avoid crashing if server blocks mail()
                try {
                    $emailService = new EmailService();
                    $emailService->sendAdminNotification($messageModel->name, $messageModel->email, $messageModel->message);
                } catch (\Exception $e) {
                    // Ignore email error in prod to let database entry succeed
                }

                ob_end_clean();
                header('Content-Type: application/json');
                echo json_encode(['success' => true, 'message' => 'Votre message a été enregistré avec succès !']);
            } else {
                ob_end_clean();
                header('Content-Type: application/json');
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Erreur technique lors de l\'enregistrement.']);
            }
        } catch (\PDOException $e) {
            ob_end_clean();
            header('Content-Type: application/json');
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Erreur SQL : ' . $e->getMessage()]);
        }
    }
}
