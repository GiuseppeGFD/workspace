<?php
$numeros = unserialize($_COOKIE['numeros']);
echo '<h2>' . implode(' + ', $numeros) . ' = ';

$suma_parcial = 0;
foreach ($numeros as $numero) {
    $suma_parcial = $suma_parcial + $numero;
}
echo $suma_parcial;
echo '</h2>';
?>
<button onclick="window.location.href='p1.php'">Volver</button>