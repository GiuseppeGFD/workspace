<?php
// Ejercicio numero uno: pedir infinitos numeros enteros 
// hasta qye se introduzca el cero, indicar finakmente cuak 
// fue el maximo y cual fue el minimo

$maximo = 0;
$minimo = 0;

do {
    $numero = readline("Escribe un numero: ");
    if (empty($numero)) {
        echo "No se ha introducido ningun numero\n";
    } else if ($numero < $minimo) {
        $minimo = $numero;
    } else if ($numero > $maximo) {
        $maximo = $numero;
    }
    5


} while ($numero != 0);

echo "El numero maximo es: " . $maximo . "\n";
echo "El numero minimo es: " . $minimo . "\n";
?>