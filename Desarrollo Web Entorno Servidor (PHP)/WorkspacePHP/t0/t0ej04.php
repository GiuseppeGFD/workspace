<?php

function sumar($array)
{
    $suma = $array[0];
    for ($i = 1; $i < count($array); $i++) {
        $suma = $suma + $array[$i];
    }
    echo ("la suma es: " . $suma . "\n");
}

function restar($array)
{
    $resta = $array[0];
    for ($i = 1; $i < count($array); $i++) {
        $resta = $resta - $array[$i];
    }
    echo ("la resta es: " . $resta . "\n");
}

function multiplicar($array)
{
    $dato = 1;
    for ($i = 0; $i < count($array); $i++) {
        $dato = $dato * $array[$i];
    }
    echo ("la multiplicacion es: " . $dato . "\n");
}

$array = [];

do {
    $n = (int) readline("Introduce un numero entero: ");
    if ($n != 0) {
        $array[] = $n;
    }
} while ($n != 0);

$operacion = readline("Escribe (m) para multiplicar, (+) para sumar o (-) para restar: ");

switch ($operacion) {
    case "m":
        multiplicar($array);
        break;
    case "+":
        sumar($array);
        break;
    case "-":
        restar($array);
        break;
    default:
        echo ("Operacion incorrecta\n");
}
?>