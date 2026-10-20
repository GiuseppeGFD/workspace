<?php
$numero = 0;
$min = null;
$max = null;

do {
    echo 'Introduce un numero: ';
    fscanf(STDIN, "%d\n", $numero);
    if ($numero != 0) {
        if ($min === null && $max === null) {
            $min = $numero;
            $max = $numero;
        } else {
            if ($numero < $min) {
                $min = $numero;
            } else if ($numero > $max) {
                $max = $numero;
            }
        }
    }
} while ($numero != 0);

echo "Máximo: " . $max . "\nMínimo: " . $min . "\n";
?>