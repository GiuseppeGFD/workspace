<?php
session_start();

// Limpiamos y destruimos la sesión
session_unset();
session_destroy();

// Redirigimos al login
header("Location: login.php");
exit();
?>