<?php
namespace App\Controllers;

use App\Core\Database;
use App\Models\AuthModel;
use App\Services\LoggerService;

class AuthController {
    public function login() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['admin'])) {
            \App\Core\ViewHelper::redirect('/admin');
        }

        $logger = new \App\Services\LoggerService();

        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Anti-brute force delay (basic)
            if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= 5) {
                if (time() - $_SESSION['last_attempt'] < 60) {
                    $error = "Trop de tentatives. Veuillez patienter 1 minute.";
                    $logger->log('BRUTE_FORCE_ATTEMPT', 'AUTH', "Username: " . $_POST['username']);
                } else {
                    $_SESSION['login_attempts'] = 0;
                }
            }

            if (!$error) {
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';

                $database = new Database();
                $db = $database->getConnection();
                $authModel = new AuthModel($db);

                $user = $authModel->login($username, $password);

                if ($user) {
                    // SECURE SESSION: Prevent fixation
                    session_regenerate_id(true);
                    
                    $_SESSION['admin'] = $user['username'];
                    $_SESSION['admin_id'] = $user['id'];
                    $_SESSION['login_attempts'] = 0;

                    $logger->log('LOGIN_SUCCESS', 'AUTH', "Admin logged in");

                    \App\Core\ViewHelper::redirect('/admin');
                } else {
                    $_SESSION['login_attempts'] = ($_SESSION['login_attempts'] ?? 0) + 1;
                    $_SESSION['last_attempt'] = time();
                    $error = "Identifiants invalides.";
                    
                    $logger->log('LOGIN_FAILURE', 'AUTH', "Username: $username");
                }
            }
        }

        require_once __DIR__ . '/../../views/admin/login.php';
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $logger = new LoggerService();
        $logger->log('LOGOUT', 'AUTH', "User logged out");

        session_destroy();
        \App\Core\ViewHelper::redirect('/login');
    }
}
