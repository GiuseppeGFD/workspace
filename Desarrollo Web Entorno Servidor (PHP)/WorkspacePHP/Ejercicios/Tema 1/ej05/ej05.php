<?php
// Ejercicio 5: Ciclar entre las cartas de la baraja española tantas veces como diga el número n.

$cartas = ["as", "dos", "tres", "cuatro", "cinco", "seis", "siete", "sota", "caballo", "rey"];

echo "Introduce n: ";
fscanf(STDIN, "%d\n", $n);

$resultado = [];
for ($i = 0; $i < $n; $i++) {
    $resultado[] = $cartas[$i % count($cartas)];
}

echo implode(" ", $resultado) . "\n";
?>
