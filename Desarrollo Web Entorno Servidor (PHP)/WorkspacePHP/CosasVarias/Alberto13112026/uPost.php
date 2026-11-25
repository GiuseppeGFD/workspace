<?php
require_once '../../lib/rb.php';
R::setup('mysql:host=localhost;dbname=test', 'root', '');

$id = isset($_POST['id']) ? $_POST['id'] : null;
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'John';
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : 'Doe';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '-';

$p = R::load('persona', $id);
$p->nombre = $nombre;
$p->apellido = $apellido;
$p->telefono = $telefono;
R::store($p);
header('Location:rGet.php');

?>