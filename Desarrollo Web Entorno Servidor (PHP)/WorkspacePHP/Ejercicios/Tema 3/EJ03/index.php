<?php

$ruta_base = '/workspace/Desarrollo%20Web%20Entorno%20Servidor%20(PHP)/WorkspacePHP/Ejercicios/Tema%203/EJ03';

if (isset($_POST['nombre']) && isset($_POST['nivel']) && !empty($_POST['nombre']) && !empty($_POST['nivel'])) {
    if (isset($_POST['valor']) && !empty($_POST['valor'])) {
        if ($_POST['nivel'] == 'nivel1') {
            setcookie($_POST['nombre'], $_POST['valor'], 0, $ruta_base . '/nivel1/');
            echo '<h2>Se ha guardado la cookie del nivel 1</h2>';
        } else if ($_POST['nivel'] == 'nivel2') {
            setcookie($_POST['nombre'], $_POST['valor'], 0, $ruta_base . '/nivel1/nivel2/');
            echo '<h2>Se ha guardado la cookie del nivel 2</h2>';
        } else if ($_POST['nivel'] == 'nivel3') {
            setcookie($_POST['nombre'], $_POST['valor'], 0, $ruta_base . '/nivel1/nivel2/nivel3/');
            echo '<h2>Se ha guardado la cookie del nivel 3</h2>';
        }
    }
}
?>
<a href="nivel1/nivel2/nivel3/nivel3.php">nivel 3</a>
<a href="nivel1/nivel2/nivel2.php">nivel 2</a>
<a href="nivel1/nivel1.php">nivel 1</a>


<form action="" method="post">
    <input type="text" name="nombre" placeholder="Cookie's name..">
    <input type="text" name="valor" placeholder="Cookie's value..">
    <select name="nivel" id="nivel">
        <option value="nivel1" name="nivel1" selected>Nivel 1</option>
        <option value="nivel2" name="nivel2">Nivel 2</option>
        <option value="nivel3" name="nivel3">Nivel 3</option>
    </select>
    <input type="submit" value="crear cookie">
</form>