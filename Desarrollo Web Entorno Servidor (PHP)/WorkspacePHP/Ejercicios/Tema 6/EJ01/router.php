<?php
// Router para el servidor integrado de PHP (php -S): equivale al .htaccess de Apache.
// Uso: php -S localhost:8000 router.php   (ejecutado desde esta carpeta)
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false; // ficheros reales (css, js, imagenes) se sirven tal cual
}
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/index.php';
require __DIR__ . '/index.php';
