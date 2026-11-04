<?php require_once('../functions.php'); ?>
<h1>Pagina 1 - pedir sumandos</h1>
<form action="" method="post">
    <label>Cantidad de sumandos <input type="text" name="cantidadsumandos" placeholder="Introduce cantidad"></label>
    <?php recibirCantidadSumandos(); ?>
    <input type="submit" value="enviar">
</form>