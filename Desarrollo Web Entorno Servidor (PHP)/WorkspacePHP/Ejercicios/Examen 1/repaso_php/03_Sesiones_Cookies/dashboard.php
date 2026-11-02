<?php
session_start();

// Bloqueo: si no estas logueado, fuera
if (!isset($_SESSION['usuario_logueado'])) {
    header("Location: login.php");
    exit();
}

// Logica para salir
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario_logueado']); ?>!</h2>
    <p>Sesion iniciada correctamente.</p>
    <a href="?logout=1">Cerrar sesion</a>
</body>
</html>