<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>

<body>
    <?php
    $numeros = $_SESSION['numeros'] ?? [];
    $suma_parcial = 0;
    foreach ($numeros as $numero) {
        $suma_parcial += $numero;
    }
    echo '<h2>' . implode(' + ', $numeros) . ' = ' . $suma_parcial . '</h2>';
    ?>
    <button onclick="window.location.href='index.php'">Volver</button>
</body>

</html>