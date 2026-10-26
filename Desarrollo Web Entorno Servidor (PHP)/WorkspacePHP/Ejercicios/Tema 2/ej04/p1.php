<?php
if (!isset($_REQUEST['nombre']) || !isset($_REQUEST['mail']) || !isset($_REQUEST['contrasena'])) {
    header('Location: index.php?error=' . 'ERROR: Formulario no Recibido');
    exit();
} else if (empty($_REQUEST['nombre']) || empty($_REQUEST['mail']) || empty($_REQUEST['contrasena'])) {
    header('Location: index.php?error=' . 'ERROR: debes introducir todos los campos');
    exit();
} else if (strlen($_REQUEST['contrasena']) < 6 || strlen($_REQUEST['contrasena']) > 12) {
    header('Location: index.php?error=' . 'ERROR: La contraseña debe tener entre 6 y 12 caracteres');
    exit();
} else if (isset($_REQUEST['nombre']) || isset($_REQUEST['mail']) || isset($_REQUEST['contrasena'])) {
    $nombre = $_REQUEST['nombre'];
    $email = $_REQUEST['mail']; ?>

                <center>
                    <h1>¡Registro completado con éxito para!</h1>
                    <p> Bienvenido <?= $nombre ?>, <?= $email ?></p>
                </center>

    <?php
} ?>