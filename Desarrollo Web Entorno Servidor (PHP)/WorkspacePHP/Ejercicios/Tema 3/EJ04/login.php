<?php
require_once('assets/backend/util.php');

if (isset($_GET['logout'])) {
    cerrarSesion();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    autenticarUsuario();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Usuario</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <form action="" method="POST">
        <label>Inicia sesión</label>
        <?php comprobarErrores(); ?>
        <input type="text" name="username"
            value="<?= isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : '' ?>"
            placeholder="Nombre de usuario">
        <input type="password" name="password" placeholder="Contraseña">
        <label>
            <input type="checkbox" value="on" name="mantener" <?= (isset($_COOKIE['mantener']) && $_COOKIE['mantener'] === 'on') ? 'checked' : '' ?>>mantener
        </label>
        <input type="submit" value="enviar">
    </form>
</body>

</html>