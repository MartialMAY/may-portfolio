<?php
namespace Controllers;

use Config\Database;
use Models\AuthModel;

class AuthController {
    public function login() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $base = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);

        if (isset($_SESSION['admin'])) {
            header('Location: ' . $base . '/admin');
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
                header('Location: ' . $base . '/admin');
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
        $base = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
        session_destroy();
        header('Location: ' . $base . '/login');
        exit();
    }
}
