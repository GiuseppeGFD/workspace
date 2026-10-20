<?php
// Ejercicio 3: Dado dos números n y p (con p entre 1 y 10), ciclar entre el cero y el p-1 tantas veces como diga n.

echo "Introduce n: ";
fscanf(STDIN, "%d\n", $n);

do {
    echo "Introduce p (entre 1 y 10): ";
    fscanf(STDIN, "%d\n", $p);
} while ($p < 1 || $p > 10);

$resultado = [];
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $p; $j++) {
        $resultado[] = $j;
    }
}

echo implode(" ", $resultado) . "\n";
?>