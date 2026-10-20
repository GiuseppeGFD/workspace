<?php
// Ejercicio 4: Obtener números enteros hasta introducir 0. Luego pedir operación (sumar o multiplicar).

$numeros = [];

do {
    echo "Introduce n: ";
    fscanf(STDIN, "%d\n", $n);
    if ($n != 0) {
        $numeros[] = $n;
    }
} while ($n != 0);

echo "Operación? ";
$operacion = trim(fgets(STDIN));
$operacion = strtolower($operacion);

if ($operacion === "sumar") {
    $suma = array_sum($numeros);
    echo "La suma vale $suma\n";
} else if ($operacion === "multiplicar") {
    if (empty($numeros)) {
        $producto = 0;
    } else {
        $producto = array_product($numeros);
    }
    echo "La multiplicación vale $producto\n";
} else {
    echo "Error: Operación no válida\n";
}
?>
