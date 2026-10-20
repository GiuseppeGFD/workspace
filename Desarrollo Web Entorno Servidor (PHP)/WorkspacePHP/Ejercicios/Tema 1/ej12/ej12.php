<?php
// Ejercicio 12: Sustituir la palabra 'tonto' por '*****'.

echo "Introduce un texto (pulsa Enter para usar el de ejemplo): ";
$input = trim(fgets(STDIN));
$texto = !empty($input) ? $input : "Ese chico es un tonto y comete errores de tonto todo el tiempo.";

$censurado = str_ireplace("tonto", "*****", $texto);

echo "\nTexto original:\n$texto\n";
echo "\nTexto con censura:\n$censurado\n";
?>
