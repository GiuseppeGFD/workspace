<?php
session_start();

if (!isset($_SESSION["veces"])) {
    $_SESSION['veces'] = (int)($_GET['veces'] ?? 1);
    $_SESSION['conteo'] = 1;
    $_SESSION['numeros'] = [];
} else {
    if (isset($_REQUEST['numero'])) {
        $_SESSION['numeros'][] = (int)$_REQUEST['numero'];
        $_SESSION['conteo']++;
    }
    if ($_SESSION['conteo'] > $_SESSION['veces']) {
        header('Location: final.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducir valores</title>
</head>

<body>
    <h1>Introduce los valores</h1>
    <form action="inputs.php" method="post">
        <h2>Introduce el sumando número <?= $_SESSION['conteo'] ?> de <?= $_SESSION['veces'] ?> (1...10)</h2>
        <input type="number" min="1" max="10" value="5" name="numero" required>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>