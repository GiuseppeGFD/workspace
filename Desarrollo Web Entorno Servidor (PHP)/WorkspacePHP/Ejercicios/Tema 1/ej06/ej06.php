<?php
// Ejercicio 6: Nombres y edades con arrays asociativos hasta 'fin'.

$personas = [];

while (true) {
    echo "Nombre? ";
    $nombre = trim(fgets(STDIN));
    if (strtolower($nombre) === "fin") {
        break;
    }
    echo "Edad de $nombre? ";
    fscanf(STDIN, "%d\n", $edad);
    $personas[$nombre] = $edad;
}

// Salida solicitada en el ejemplo: Ana(18), Pepe(15), Rosa(18), Juan(17),
$salida = [];
foreach ($personas as $nombre => $edad) {
    $salida[] = "$nombre($edad)";
}
echo implode(", ", $salida) . ",\n\n";

// --- RESPUESTAS A LAS PREGUNTAS DEL ENUNCIADO ---
// 1. ¿Qué ocurre si dos personas se llaman igual?
// En un array asociativo con clave $nombre ($personas[$nombre] = $edad), si dos personas tienen
// el mismo nombre, la segunda sobreescribirá la edad de la primera (las claves asociativas deben ser únicas).
// Solución alternativa: almacenar una lista de arrays: $personas[] = ['nombre' => $nombre, 'edad' => $edad].

// 2. ¿Cómo podríamos ver la información anterior ordenada por nombre?
echo "Ordenada por nombre (alfabético):\n";
$porNombre = $personas;
ksort($porNombre);
$salidaNom = [];
foreach ($porNombre as $nombre => $edad) {
    $salidaNom[] = "$nombre($edad)";
}
echo implode(", ", $salidaNom) . ",\n\n";

// 3. ¿Y por edad descendente?
echo "Ordenada por edad descendente:\n";
$porEdad = $personas;
arsort($porEdad);
$salidaEdad = [];
foreach ($porEdad as $nombre => $edad) {
    $salidaEdad[] = "$nombre($edad)";
}
echo implode(", ", $salidaEdad) . ",\n";
?>
