<?php
$numero = (int)($_GET['numero'] ?? 0);
$sol = 'No Primo';

if ($numero > 1) {
    $es_primo = true;
    for ($i = 2; $i * $i <= $numero; $i++) {
        if ($numero % $i == 0) {
            $es_primo = false;
            break;
        }
    }
    $sol = $es_primo ? 'Primo' : 'No Primo';
}

echo $sol;
?>