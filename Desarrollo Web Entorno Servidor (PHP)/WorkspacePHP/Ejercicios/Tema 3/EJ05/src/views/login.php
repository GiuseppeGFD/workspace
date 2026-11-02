<?php
require_once('../functions.php');
include('../include/header.php');
$error = verificarErrores();
autenticar();
?>
<center>
    <h1>Tratamiento de cookies</h1>
    <form action="" method="POST">
        <label>Usuario <input type="text" name="datoUsuario[]" placeholder="nombre"></label><br>
        <label>Clave <input type="password" name="datoUsuario[]" placeholder="contraseña"></label><br>
        <input type="submit" value="autenticar">
        <?php echo $error; ?>
    </form>
</center>