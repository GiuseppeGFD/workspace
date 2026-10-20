<?php
// Ejercicio 11: Parsear y formatear cadena de contactos separada por // y :.

echo "Introduce la cadena (pulsa Enter para usar la de ejemplo): ";
$input = trim(fgets(STDIN));
$cadena = !empty($input) ? $input : "Alberto:Garay:913334455//Ana:Garcia:914445566";

echo "\nProcesando cadena:\n$cadena\n\n";

$registros = explode("//", $cadena);
$salidas = [];

foreach ($registros as $registro) {
    $registro = trim($registro);
    if (empty($registro)) {
        continue;
    }
    $partes = explode(":", $registro);
    if (count($partes) >= 3) {
        $nombre = $partes[0];
        $apellido = $partes[1];
        $telefono = $partes[2];

        $salidas[] = "Nombre: $nombre\nApellido: $apellido\nTeléfono: $telefono";
    }
}

echo implode("\n============\n", $salidas) . "\n";
?>
