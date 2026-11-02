<?php
require_once('assets/backend/util.php');
comprobarAcceso();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <h1>Bienvenido, <?= htmlspecialchars($_COOKIE['usuario_activo'] ?? 'admin') ?></h1>

    <form action="login.php" method="GET">
        <input type="hidden" name="logout" value="1">
        <input type="submit" value="salir">
    </form>
</body>

</html>