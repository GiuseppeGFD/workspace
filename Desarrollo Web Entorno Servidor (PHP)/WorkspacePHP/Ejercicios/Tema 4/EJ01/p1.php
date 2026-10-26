<?php

if (isset($_REQUEST['nombre']) && !empty($_REQUEST['nombre'])) {
    $nombre = $_REQUEST['nombre'];
    $random = random_int(1, 3);
    switch ($random) {
        case 1:
            echo '<h1>Hola ' . $nombre . "</h1>";
            break;
        case 2:
            echo '<h2>Que tal estás ' . $nombre . "</h2>";
            break;
        case 3:
            echo '<h3>Que pasa ' . $nombre . "</h3>";
            break;
        default:
            echo '<h1>no pero hubo un error</h1>';
            break;
    }
} else {
    echo "<p style=color:red;>Debes introducir un valor</p>";
}



?>