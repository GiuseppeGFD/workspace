<?php
session_start();

// Si ya ha iniciado sesión, lo enviamos al panel directamente
if (isset($_SESSION['usuario'])) {
    header("Location: panel.php");
    exit();
}

$error = "";

// Comprobamos si el formulario se ha enviado por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validamos las credenciales
    if ($usuario === 'admin' && $password === '1234') {
        $_SESSION['usuario'] = $usuario;
        header("Location: panel.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>

<body>
    <h2>Iniciar Sesión</h2>

    <?php if (!empty($error)): ?>
        <p style="color: red;">
            <?php echo $error; ?>
        </p>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Entrar</button>
    </form>
</body>

</html>