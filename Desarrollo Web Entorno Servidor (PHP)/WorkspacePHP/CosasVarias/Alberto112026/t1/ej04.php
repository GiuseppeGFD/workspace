<?php

// ===== FUNCIONES ==========

function sumar($a)
{
    $total = 0;
    foreach ($a as $numero) {
        $total += $numero;
    }
    return $total;
}

function multiplicar($a)
{
    $total = 1;
    foreach ($a as $numero) {
        $total *= $numero;
    }
    return $total;
}


//================= MAIN ====================
$a = [];
do {
    echo 'Introduce n: ';
    $n = readLine();
    if ($n != 0) {
        //array_push($a, $n);
        $a[] = $n;
    }
}
while ($n != 0);

print_r($a);

echo 'Operación (sumar/multiplicar): ';
$operacion = readLine();

switch ($operacion) {
    case 'sumar':
        echo sumar($a);
        break;
    case 'multiplicar':
        echo multiplicar($a);
        break;
    default:
        echo 'Operación inválida';
}
?>