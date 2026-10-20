<?php
$n = (int) readline("Introduce un numero: ");
$simbolo = ["+", "-", "."];

for ($i = $n; $i > 0; $i--) {
    for ($j = $i; $j > 0; $j--) {
        echo ($simbolo[$j % 3]); // intercala siempre entre 0 1 2
    }
    echo ("\n");
}
?>