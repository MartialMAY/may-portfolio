<?php
// Simple Autoloader
spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once $path;
    } else {
        // Test lowercase directory (e.g., Controllers -> controllers)
        $loweredPath = strtolower(dirname($path)) . '/' . basename($path);
        if (file_exists($loweredPath)) {
            require_once $loweredPath;
        }
    }
});

use Router\Router;
use Controllers\HomeController;
use Controllers\AuthController;
use Controllers\AdminController;

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

$router->run();
