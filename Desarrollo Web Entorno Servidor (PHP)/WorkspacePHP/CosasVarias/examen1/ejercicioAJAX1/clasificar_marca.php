<?php
$marca = $_GET['marca'];
$paises = [
    'Toyota' => 'Japón',
    'Ford' => 'EE. UU.',
    'BMW' => 'Alemania',
    'Fiat' => 'Italia'
];
$sol = $paises[$marca] ?? 'Desconocido';
echo $sol;
?>