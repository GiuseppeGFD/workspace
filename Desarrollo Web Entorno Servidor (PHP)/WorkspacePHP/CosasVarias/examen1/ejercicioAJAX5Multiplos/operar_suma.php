<?php
// Recibe dos números y devuelve su suma.
$num1 = (float)($_GET['num1'] ?? 0);
$num2 = (float)($_GET['num2'] ?? 0);

$sol = $num1 + $num2;

echo number_format($sol, 2);
?>