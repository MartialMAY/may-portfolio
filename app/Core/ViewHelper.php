<?php
namespace App\Core;

class ViewHelper {
    /**
     * Returns the absolute URL for a given path.
     */
    public static function url($path = '') {
        // Dynamic detection of base path and host
        $scriptName = $_SERVER['SCRIPT_NAME'] ?? '/index.php';
        $base = str_replace('/index.php', '', $scriptName);
        
        $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        
        $baseUrl = $protocol . "://" . $host . $base;
        $path = ltrim($path, '/');
        return $baseUrl . ($path ? '/' . $path : '');
    }

    /**
     * Returns the absolute URL for an asset.
     */
    public static function asset($path) {
        return self::url('assets/' . ltrim($path, '/'));
    }

    /**
     * Securely encode data for JavaScript.
     */
    public static function json($data) {
        return json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Simple redirect helper.
     */
    public static function redirect($path) {
        header('Location: ' . self::url($path));
        exit();
    }
}
