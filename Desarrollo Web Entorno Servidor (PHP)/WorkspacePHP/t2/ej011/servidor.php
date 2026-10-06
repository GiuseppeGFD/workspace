<?php
$texto = isset($_GET['nombre']) ? $_GET['nombre'] : 'desconocido';
$accion = $_GET['dedear'];
$accion = $_GET['lickear'];

echo "<h1>$accion $texto</h1>";
?>