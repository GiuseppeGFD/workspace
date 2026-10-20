<?php
// Ejercicio 13: Sustituir una lista de palabras prohibidas por '*****'.

$prohibidas = ["tonto", "idiota", "bobo", "inútil", "torpe"];

echo "Palabras prohibidas en la lista: " . implode(", ", $prohibidas) . "\n";
echo "Introduce un texto (pulsa Enter para usar el de ejemplo): ";
$input = trim(fgets(STDIN));
$texto = !empty($input) ? $input : "Un tonto y un idiota hablaban mientras el bobo no hacía nada.";

// Se puede sustituir por '*****' fijo o por tantos asteriscos como caracteres tenga cada palabra:
$reemplazos = array_map(function ($palabra) {
    return str_repeat("*", mb_strlen($palabra));
}, $prohibidas);

// Versión con asteriscos del mismo tamaño que la palabra:
$censuradoLongitud = str_ireplace($prohibidas, $reemplazos, $texto);

// Versión con '*****' fijo:
$censuradoFijo = str_ireplace($prohibidas, "*****", $texto);

echo "\nTexto original:\n$texto\n";
echo "\nTexto censurado (con '*****'):\n$censuradoFijo\n";
echo "\nTexto censurado (con longitud exacta de asteriscos):\n$censuradoLongitud\n";
?>
