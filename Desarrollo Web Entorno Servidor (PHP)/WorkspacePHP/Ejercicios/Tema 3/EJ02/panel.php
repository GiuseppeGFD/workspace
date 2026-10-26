<?php
session_start();

// Control de acceso: si no hay sesión, al login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Control</title>
</head>

<body>
    <h1>¡Bienvenido al panel de control, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
    <p><a href="logout.php">Cerrar sesión</a></p>
</body>

</html>