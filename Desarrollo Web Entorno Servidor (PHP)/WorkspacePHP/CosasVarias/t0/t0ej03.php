<?php
$veces = (int) readline("Introduce cuantas veces ciclar");
$cuanto = (int) readline("Introduce hasta que numero: ");

for ($i = 0; $i < $veces; $i++) {
    for ($j = 0; $j < $cuanto; $j++) {
        echo ($j . " ");
    }
}
?>