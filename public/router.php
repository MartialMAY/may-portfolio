<?php
// Pour le serveur PHP intégré : servir les fichiers statiques directement
$path = __DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (is_file($path)) {
    return false;
}
// Sinon, tout passe par le front controller
require __DIR__ . '/index.php';
