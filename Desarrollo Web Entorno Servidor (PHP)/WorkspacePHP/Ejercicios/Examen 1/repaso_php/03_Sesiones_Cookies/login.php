<?php
session_start();
require_once '../funciones_globales.php';

$usuarios_validos = ['pepe' => '1234', 'ana' => 'abcd'];
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = obtenerParametro('usuario');
    $clave = obtenerParametro('clave');
    
    if (isset($usuarios_validos[$usuario]) && $usuarios_validos[$usuario] === $clave) {
        $_SESSION['usuario_logueado'] = $usuario;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Usuario o contrasena incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Acceso al sistema</h2>
    <?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
    
    <form method="POST" action="">
        <label>Usuario:</label>
        <input type="text" name="usuario" value="<?php echo obtenerParametro('usuario'); ?>"><br><br>
        
        <label>Contrasena:</label>
        <input type="password" name="clave"><br><br>
        
        <input type="submit" value="Entrar">
    </form>
</body>
</html>