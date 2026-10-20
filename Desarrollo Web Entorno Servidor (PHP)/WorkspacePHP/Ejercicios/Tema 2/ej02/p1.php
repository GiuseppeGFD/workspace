<?php

if (isset($_REQUEST['usuario']) && isset($_REQUEST['contrasena'])) {

    $user = $_REQUEST['usuario'];
    $contra = $_REQUEST['contrasena'];

    if (empty($user) || empty($contra)) {
        header("Location: index.php?aviso=Debes rellenar todos los campos.");
        exit();

    } else if ($user != "admin" || $contra != "1234") {
        header("Location: index.php?aviso=Usuario o contraseña incorrecto");
        exit();

    } else if ($user == "admin" && $contra == "1234") {
        echo "<h1>INICIO DE SESIÓN EXITOSO</h1>";
    }
} else { // SI NO HAY NI PARAMETROS
    header("Location: index.php?aviso=" . "NO SE HA ENVIADO NINGUN FORMULARIO");
    exit();
}
?>