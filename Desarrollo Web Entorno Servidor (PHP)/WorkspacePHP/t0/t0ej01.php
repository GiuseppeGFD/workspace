<?php
$numeroMax = (int) 0;
$numeroMin = (int) 0;

$esprimero = true;
do {
    // Le ponemos (int) para asegurar que lo que escribas se trate como un número
    $numeroEntero = (int) readline("Introduce un numero entero: ");

    if ($esprimero == true) {
        $numeroMax = $numeroEntero;
        $numeroMax = $numeroEntero;
        $esprimero = false;
    }
    if ($numeroEntero != 0) {
        if ($numeroEntero > $numeroMax) {
            $numeroMax = $numeroEntero;
        }
        // ¡Cambiamos el elseif por un if normal!
        if ($numeroEntero < $numeroMin) {
            $numeroMin = $numeroEntero;
        }
    }
} while ($numeroEntero != 0);

if ($esprimero == false) {
    echo ("El numero máximo es " . $numeroMax . " Y el minimo es " . $numeroMin . "\n");

}
?>