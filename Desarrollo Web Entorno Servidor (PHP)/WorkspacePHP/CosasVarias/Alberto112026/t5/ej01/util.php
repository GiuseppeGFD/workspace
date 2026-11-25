<?php
require_once(__DIR__ . '/../utilDB.php');
function insertar($productos)
{
    $db = conectarMySQL();
    foreach ($productos as $producto) {
        $sql = <<<SQL
        insert into producto(nombre,precio)
        values ('{$producto[0]}' , $producto[1])
SQL;
        $db->exec($sql);
    }
}
?>