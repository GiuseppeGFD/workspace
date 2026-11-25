<?php
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'desconocido';
$saludo_num = random_int(1, 3);
$t = random_int(1, 3);
switch ($saludo_num) {
    case 1:
        $saludo = "Hola $nombre";
        break;
    case 2:
        $saludo = "Qué tal estás $nombre";
        break;
    case 3:
        $saludo = "¡¡Qué pasa $nombre!!";
        break;
}
echo "<h$t>" . $saludo . "</h$t>";
?>