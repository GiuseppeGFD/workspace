<?php
require_once '../../lib/rb.php';
R::setup('mysql:host=localhost;dbname=test', 'root', '');

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'John';
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : 'Doe';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '-';

$p = R::dispense('persona');
$p->nombre = $nombre;
$p->apellido = $apellido;
$p->telefono = $telefono;
R::store($p);
header('Location:rGet.php');
?>