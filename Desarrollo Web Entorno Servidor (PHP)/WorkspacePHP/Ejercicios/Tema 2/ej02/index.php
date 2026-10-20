<form action="p1.php" method="post">
    <label>user</label>
    <input type="text" name="usuario" placeholder="Usuario..." /><br>

    <label>password</label>
    <input type="password" name="contrasena" placeholder="Contraseña..." /><br>

    <input type="submit" value="enviar" />
</form>

<?php
if (isset($_REQUEST['aviso'])) {
    $mensaje = $_REQUEST['aviso'];
    echo "<h3>$mensaje</h3>";
}
?>