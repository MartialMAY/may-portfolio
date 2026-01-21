<?php
namespace Controllers;

use Config\Database;
use Models\AuthModel;

class AuthController {
    public function login() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['admin'])) {
            header('Location: /testportfolio/admin');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $database = new Database();
            $db = $database->getConnection();
            $authModel = new AuthModel($db);

            $user = $authModel->login($username, $password);

            if ($user) {
                $_SESSION['admin'] = $user['username'];
                $_SESSION['admin_id'] = $user['id'];
                header('Location: /testportfolio/admin');
                exit();
            } else {
                $error = "Identifiants invalides.";
            }
        }

        require_once 'views/admin/login.php';
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: /testportfolio/login');
        exit();
    }
}
