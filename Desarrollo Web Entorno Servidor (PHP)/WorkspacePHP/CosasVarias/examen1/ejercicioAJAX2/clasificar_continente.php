<?php
$ciudad = $_GET['ciudad'];
$continentes = [
    'Madrid' => 'Europa',
    'París' => 'Europa',
    'Tokyo' => 'Asia',
    'Nueva York' => 'América'
];

// Usamos el operador de fusión null (??) para asegurar una respuesta.
$sol = $continentes[$ciudad] ?? 'No clasificada';
echo $sol;
?>