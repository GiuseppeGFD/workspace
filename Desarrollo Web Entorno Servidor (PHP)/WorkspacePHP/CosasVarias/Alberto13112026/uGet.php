<?php
require_once '../../lib/rb.php';
R::setup('mysql:host=localhost;dbname=test', 'root', '');
$persona = R::load('persona', $_GET['id']);
?>
<h2>Editar persona</h2>
<form action="uPost.php" method="post">
    <input type="hidden" name="id" value="<?= $persona->id ?>" />
    Nombre<input type="text" name="nombre" value="<?= $persona->nombre ?>" /><br>
    Apellido<input type="text" name="apellido" value="<?= $persona->apellido ?>" /><br>
    Teléfono<input type="text" name="telefono" value="<?= $persona->telefono ?>" /><br>
    <input type="submit" />
</form>