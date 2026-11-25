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
$nombre = isset($_GET['n']) ? $_GET['n'] : 'desconocido';

$sql = <<<SQL
select nombre,precio
from producto
where nombre='$nombre' or true or nombre=''
SQL;

$filas = $db->query($sql);
echo '<ul>';
foreach ($filas as $fila) {
    echo "<li>{$fila['nombre']} - {$fila['precio']}</li>";
}
echo '</ul>';

?>