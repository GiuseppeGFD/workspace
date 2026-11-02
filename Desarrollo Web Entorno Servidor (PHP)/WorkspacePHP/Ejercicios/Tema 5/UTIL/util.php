<?php
function conectarMySQL(
    $schema = 'test',
    $usu = 'root',
    $pwd = '',
    $host = '127.0.0.1' // <-- Cambiar "localhost" por "127.0.0.1"
) {
    try {
        $dsn = "mysql:host=$host;dbname=$schema";
        $db = new PDO($dsn, $usu, $pwd);
    } catch (PDOException $e) {
        print ("ERROR de conexión a $schema: " . $e->getMessage() . PHP_EOL);
        die();
    }
    return $db;
}

?>