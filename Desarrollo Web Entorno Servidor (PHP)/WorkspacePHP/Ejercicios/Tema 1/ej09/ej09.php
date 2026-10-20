<?php
// Ejercicio 9: Formatos numéricos.
// Requisito: Sólo un bucle, sin sentencias 'if' ni 'switch'.

$formatos = [
    'nombre' => [1 => 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve', 'diez'],
    'romano' => [1 => 'i', 'ii', 'iii', 'iv', 'v', 'vi', 'vii', 'viii', 'ix', 'x']
];

echo "N: ";
fscanf(STDIN, "%d\n", $n);
echo "Formato: ";
$formato = trim(fgets(STDIN));

$resultado = [];
for ($i = 1; $i <= $n; $i++) {
    $resultado[] = $formatos[$formato][$i];
}

echo implode(", ", $resultado) . "\n";
?>
