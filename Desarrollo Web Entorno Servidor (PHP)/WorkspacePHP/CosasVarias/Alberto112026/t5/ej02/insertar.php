<?php
require_once(__DIR__ . '/../ej01/util.php');
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;
$precio = isset($_GET['precio']) ? $_GET['precio'] : null;
insertar([[$nombre, $precio]]);
header('Location:formulario.php');
?>