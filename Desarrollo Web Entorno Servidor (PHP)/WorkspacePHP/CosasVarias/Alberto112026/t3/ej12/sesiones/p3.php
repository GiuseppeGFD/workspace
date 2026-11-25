<?php
session_start();
echo '<h2>' . implode(' + ', $_SESSION['numeros']) . ' = ';
$suma_parcial = 0;
foreach ($_SESSION['numeros'] as $numero) {
    $suma_parcial = $suma_parcial + $numero;
}
echo $suma_parcial;
echo '</h2>';
?>
<button onclick="window.location.href='p1.php'">Volver</button>