<?php
require_once('util.php');

echo 'CONECTANDO..' . PHP_EOL;
$base = conectarMySQL();

$sql = <<<SQL
CREATE TABLE persona(
    nombre varchar(25) NOT NULL,
    apellido VARCHAR(25) NOT NULL,
    dni VARCHAR(9) NOT NULL
)
SQL;

$base->exec($sql);
echo 'Sentencia ejecutada' . PHP_EOL;
?>