<?php

function autenticarUsuario()
{
    if (empty($_POST['username']) || empty($_POST['password'])) {
        setcookie('error', 'Por favor, introduce usuario y contraseña.', time() + 60);
        header('Location: login.php');
        exit();
    }

    $usuario = $_POST['username'];
    $password = $_POST['password'];

    // Credenciales válidas
    if ($usuario === 'admin' && $password === 'admin123') {
        // Cookie de usuario activo (expira al cerrar el navegador: 0)
        setcookie('usuario_activo', $usuario, 0);

        // Si marcó "mantener" (recordar usuario en el formulario)
        if (isset($_POST['mantener']) && $_POST['mantener'] === 'on') {
            setcookie('username', $usuario, time() + (3600 * 24 * 30));
            setcookie('mantener', 'on', time() + (3600 * 24 * 30));
        } else {
            // Si no lo marcó, borramos las cookies de recuerdo si existían
            setcookie('username', '', time() - 3600);
            setcookie('mantener', '', time() - 3600);
        }

        header('Location: logged.php');
        exit();
    } else {
        setcookie('error', 'El nombre de usuario o la contraseña son incorrectos.', time() + 60);
        header('Location: login.php');
        exit();
    }
}

function comprobarAcceso()
{
    // Si no hay usuario activo autenticado, volvemos al login
    if (!isset($_COOKIE['usuario_activo'])) {
        header('Location: login.php');
        exit();
    }
}

function cerrarSesion()
{
    // Borramos la cookie de sesión activa pero conservamos 'username' si 'mantener' estaba activo
    setcookie('usuario_activo', '', time() - 3600);
    header('Location: login.php');
    exit();
}

function comprobarErrores()
{
    if (isset($_COOKIE['error']) && !empty($_COOKIE['error'])) {
        echo '<p style="color:red;">' . htmlspecialchars($_COOKIE['error']) . '</p>';
        // Borramos la cookie de error para que no se vuelva a mostrar en la siguiente recarga
        setcookie('error', '', time() - 3600);
    }
}
?>