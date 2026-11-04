<?php
$numero = (int)($_GET['numero'] ?? 0);
$divisores = [];

if ($numero <= 0) {
    echo "<option>Número debe ser positivo</option>";
    exit;
}

for ($i = 1; $i <= $numero; $i++) {
    if ($numero % $i == 0) {
        $divisores[] = $i;
    }
}

$html ='';
foreach ($divisores as $d) {
    $html .= '<option>';
    $html .= $d;
    $html .= '</option>';
}
echo $html; 
?>