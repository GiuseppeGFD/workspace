<?php
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
</head>

<body>
    <h1>Indica el número de sumandos</h1>
    <form action="inputs.php" method="get">
        <input type="number" name="veces" min="1" placeholder="Escribe el número..." required>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>