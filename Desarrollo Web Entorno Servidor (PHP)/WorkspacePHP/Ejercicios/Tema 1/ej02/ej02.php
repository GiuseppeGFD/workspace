<?php
echo 'Introduce un numero: ';
fscanf(STDIN, "%d\n", $numero);
$patron = ["+", "-", "."];
$conteo = 0;

for ($i = $numero; $i >= 1; $i--) {
    for ($j = $i; $j >= 1; $j--) {
        echo $patron[$conteo % 3];
        $conteo++;
    }
    echo "\n";
}
?>