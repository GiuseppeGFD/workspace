<?php
// Ejercicio 10: Mejora del ejercicio 9 validando entradas en bucles independientes.
// Abierto a nuevos formatos sin modificar el código de validación.

$formatos = [
    'nombre' => [1 => 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve', 'diez'],
    'romano' => [1 => 'i', 'ii', 'iii', 'iv', 'v', 'vi', 'vii', 'viii', 'ix', 'x']
];

do {
    echo "N (entre 1 y 10): ";
    fscanf(STDIN, "%d\n", $n);
} while ($n < 1 || $n > 10);

$formatosDisponibles = implode(", ", array_keys($formatos));
do {
    echo "Formato ($formatosDisponibles): ";
    $formato = trim(fgets(STDIN));
} while (!array_key_exists($formato, $formatos));

$resultado = [];
for ($i = 1; $i <= $n; $i++) {
    $resultado[] = $formatos[$formato][$i];
}

echo implode(", ", $resultado) . "\n";
?>
