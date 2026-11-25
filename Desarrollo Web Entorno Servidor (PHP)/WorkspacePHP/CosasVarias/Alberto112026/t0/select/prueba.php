<?php
function conectarMySQL(
    $schema = 'test',
    $usu = 'root',
    $pwd = '',
    $host = 'localhost'
) {
    try {
        $dsn = "mysql:host=$host;dbname=$schema";
        $db = new PDO($dsn, $usu, $pwd);
    } catch (PDOException $e) {
        print ("ERROR de conexión a $schema");
        die();
    }
    return $db;
}

//===========================

$db = conectarMySQL();
$sql = <<<SQL
select nombre as n,precio as p
from producto
SQL;
$filas = $db->query($sql);

foreach ($filas as $fila) {
    echo "Nombre: {$fila['n']}, Precio: {$fila['p']}\n";
}

?>