<?php
// Ejercicio 7: Generar tags HTML <hX> crecientes de 1 a n y decrecientes de n-1 a 1.

echo "Introduce línea de texto: ";
$texto = trim(fgets(STDIN));

do {
    echo "Introduce n (entre 1 y 6): ";
    fscanf(STDIN, "%d\n", $n);
} while ($n < 1 || $n > 6);

// Creciente de 1 a n
for ($i = 1; $i <= $n; $i++) {
    echo "<h$i>$texto</h$i>\n";
}

// Decreciente de n-1 a 1
for ($i = $n - 1; $i >= 1; $i--) {
    echo "<h$i>$texto</h$i>\n";
}
?>
