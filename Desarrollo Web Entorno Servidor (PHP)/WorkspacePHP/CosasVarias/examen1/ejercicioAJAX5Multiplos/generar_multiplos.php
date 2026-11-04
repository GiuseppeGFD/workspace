<?php
// Genera los múltiplos de $base ($num1) que son menores o iguales a $limite ($num2).
$base = (int)($_GET['num1'] ?? 0);
$limite = (int)($_GET['num2'] ?? 0);

if ($base <= 0 || $limite <= 0) {
    echo "<option>Ambos números deben ser positivos.</option>";
    exit;
}

$multiplos = [];
$i = 1;
$resultado = 0;

while ($resultado < $limite) {
    $resultado = $base * $i;
    if ($resultado <= $limite) {
        $multiplos[] = $resultado;
    }
    $i++;
}

$html ='';
if (empty($multiplos)) {
    $html .= '<option>No hay múltiplos en ese rango.</option>';
} else {
    foreach ($multiplos as $m) {
        $html .= '<option>';
        $html .= $m;
        $html .= '</option>';
    }
}
echo $html; 
?>