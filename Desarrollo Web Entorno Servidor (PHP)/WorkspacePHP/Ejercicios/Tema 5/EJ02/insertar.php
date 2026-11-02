<?php
require_once('../UTIL/util.php');

function insertar($nombre, $precio)
{
    $db = conectarMySQL();
    $sql = <<<SQL
        INSERT INTO producto(nombre,precio) values($nombre,$precio);
    SQL;

    $db->prepare($sql);
}
try {
    if (isset($_REQUEST['nombre']) && isset($_REQUEST['precio']) && !empty($_REQUEST['nombre']) && !empty($_REQUEST['precio'])) {
        $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;
        $precio = isset($_REQUEST['precio']) ? $_REQUEST['precio'] : null;
        insertar($nombre, $precio);
        header('Location:index.php');
        exit();
    }
} catch (Exception $e) {
    echo $e;
}
?>