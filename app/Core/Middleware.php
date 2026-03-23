<?php
namespace App\Core;

use App\Services\LoggerService;

class Middleware {
    /**
     * Check if user is authenticated for admin routes.
     */
    public static function auth() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['admin'])) {
            $logger = new LoggerService();
            $logger->log('UNAUTHORIZED_ACCESS_ATTEMPT', 'AUTH', "URI: " . ($_SERVER['REQUEST_URI'] ?? 'None'));
            
            \App\Core\ViewHelper::redirect('/login');
        }
    }

    /**
     * Verify CSRF token for all POST requests.
     */
    public static function csrf() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['csrf_token']
                ?? $_SERVER['HTTP_X_CSRF_TOKEN']
                ?? '';

            if (!Security::verifyCsrfToken($token)) {
                $logger = new LoggerService();
                $logger->log('CSRF_INVALID_TOKEN', 'SECURITY', "Referer: " . ($_SERVER['HTTP_REFERER'] ?? 'None'));
                
                header('HTTP/1.0 403 Forbidden');
                echo "Erreur de sécurité : Jeton CSRF invalide ou manquant. Veuillez rafraîchir la page.";
                exit();
            }
        }
    }
}
