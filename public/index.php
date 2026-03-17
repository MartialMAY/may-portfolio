<?php
// Secure Session Configuration
session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => isset($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Strict'
]);
session_start();

require_once __DIR__ . '/../app/Core/Autoloader.php';
\App\Core\Autoloader::register();

// Load Environment Variables
\App\Core\Env::load(__DIR__ . '/../.env');

use App\Core\Autoloader;
use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\AdminController;
use App\Controllers\ContactController;

// Register namespaces
// Already done above

// Global Helpers
function url($path = '') {
    return \App\Core\ViewHelper::url($path);
}
function asset($path) {
    return \App\Core\ViewHelper::asset($path);
}

$router = new Router();

// Routes definition
$router->add('/', function() {
    $controller = new HomeController();
    $controller->index();
});

$router->add('/login', function() {
    $controller = new AuthController();
    $controller->login();
});

$router->add('/logout', function() {
    $controller = new AuthController();
    $controller->logout();
});

$router->add('/admin', function() {
    $controller = new AdminController();
    $controller->index();
});

$router->add('/admin/bts', function() {
    $controller = new AdminController();
    $controller->bts();
});

$router->add('/admin/logs', function() {
    $controller = new AdminController();
    $controller->logs();
});

$router->add('/admin/bts/add', function() {
    $controller = new AdminController();
    $controller->bts_edit();
});

$router->add('/admin/bts/edit', function() {
    $controller = new AdminController();
    $controller->bts_edit();
});

$router->add('/admin/bts/delete', function() {
    $controller = new AdminController();
    $controller->bts_delete();
});

// Admin Projects
$router->add('/admin/projects', function() {
    $controller = new AdminController();
    $controller->projects();
});
$router->add('/admin/projects/add', function() {
    $controller = new AdminController();
    $controller->project_edit();
});
$router->add('/admin/projects/edit', function() {
    $controller = new AdminController();
    $controller->project_edit();
});
$router->add('/admin/projects/delete', function() {
    $controller = new AdminController();
    $controller->project_delete();
});

// Admin Veille
$router->add('/admin/veille', function() {
    $controller = new AdminController();
    $controller->veille();
});
$router->add('/admin/veille/add', function() {
    $controller = new AdminController();
    $controller->veille_edit();
});
$router->add('/admin/veille/edit', function() {
    $controller = new AdminController();
    $controller->veille_edit();
});
$router->add('/admin/veille/delete', function() {
    $controller = new AdminController();
    $controller->veille_delete();
});
$router->add('/admin/veille/rss', function() {
    $controller = new AdminController();
    $controller->veille_rss();
});
$router->add('/admin/veille/sources', function() {
    $controller = new AdminController();
    $controller->veille_sources();
});
$router->add('/admin/veille/sources/delete', function() {
    $controller = new AdminController();
    $controller->veille_source_delete();
});

// Admin Timeline
$router->add('/admin/timeline', function() {
    $controller = new AdminController();
    $controller->timeline();
});
$router->add('/admin/timeline/add', function() {
    $controller = new AdminController();
    $controller->timeline_edit();
});
$router->add('/admin/timeline/edit', function() {
    $controller = new AdminController();
    $controller->timeline_edit();
});
$router->add('/admin/timeline/delete', function() {
    $controller = new AdminController();
    $controller->timeline_delete();
});

// Admin CV
$router->add('/admin/cv', function() {
    $controller = new AdminController();
    $controller->cv();
});

// Contact Submission
$router->add('/contact', function() {
    $controller = new ContactController();
    $controller->submit();
});

// Admin Messages
$router->add('/admin/messages', function() {
    $controller = new AdminController();
    $controller->messages();
});

$router->add('/admin/messages/delete', function() {
    $controller = new AdminController();
    $controller->delete_message();
});

$router->add('/admin/messages/reply', function() {
    $controller = new AdminController();
    $controller->reply();
});

$router->add('/admin/upload-ajax', function() {
    $controller = new AdminController();
    $controller->upload_ajax();
});

$router->add('/admin/settings', function() {
    $controller = new AdminController();
    $controller->settings();
});

$router->run();
