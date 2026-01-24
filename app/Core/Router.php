<?php
namespace App\Core;

class Router {
    private $routes = [];

    public function add($path, $callback) {
        $this->routes[$path] = $callback;
    }

    public function run() {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        // Dynamic base path detection (handles subdirectories automatically)
        $scriptName = $_SERVER['SCRIPT_NAME'];
        $basePath = str_replace('/index.php', '', $scriptName);
        
        if (strpos($path, $basePath) === 0) {
            $path = substr($path, strlen($basePath));
        }
        
        if ($path == '' || $path == '/') {
            $path = '/';
        }

        // Global CSRF Protection on all POST requests
        Middleware::csrf();

        // Protection for /admin routes
        if (strpos($path, '/admin') === 0 && $path !== '/login') {
            Middleware::auth();
        }

        if (array_key_exists($path, $this->routes)) {
            return call_user_func($this->routes[$path]);
        }

        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
    }
}
