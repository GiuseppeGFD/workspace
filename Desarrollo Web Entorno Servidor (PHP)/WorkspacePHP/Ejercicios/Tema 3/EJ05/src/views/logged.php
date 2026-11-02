<?php
require_once('../functions.php');
include('../include/header.php');
obtenerNombre();
mostrarSelect(); ?>

<form action="login.php">
    <input type="submit" value="desconectar">
</form>