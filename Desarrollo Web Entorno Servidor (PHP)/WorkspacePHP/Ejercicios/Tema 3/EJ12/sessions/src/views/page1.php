<?php
session_start();
session_destroy();

require_once('../functions.php'); ?>
<h1>Pagina 1 - Determinar cantidad de sumandos</h1>

<form action="" method="POST">
    <label>Cantiadad sumandos <input type="number" name="cantidadSumandos" placeholder="Introduce un numero"></label>
    <?php recibirCantidadSumandos(); ?>
    <input type="submit" value="enviar">
</form>