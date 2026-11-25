<?php
echo 'Introduce n: ';
$n = readLine();
echo "\n";
$cartas = ['as', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'sota', 'caballo', 'rey', 'joker'];
for ($i = 0; $i < $n; $i++) {
    $cartaAMostrar = $cartas[$i % sizeof($cartas)];
    echo "$cartaAMostrar ";
}
?>