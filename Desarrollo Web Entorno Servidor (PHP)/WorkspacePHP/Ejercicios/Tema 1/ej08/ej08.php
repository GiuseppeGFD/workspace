<?php
// Ejercicio 8: Tiempo transcurrido desde día/mes/año hasta la actualidad.
// Suposición del enunciado: no bisiestos y todos los meses de 30 días.

echo "Día: ";
fscanf(STDIN, "%d\n", $dia);
echo "Mes: ";
fscanf(STDIN, "%d\n", $mes);
echo "Año: ";
fscanf(STDIN, "%d\n", $anio);

$ahora = getdate();

$segundos = $ahora['seconds'];
$minutos = $ahora['minutes'];
$horas = $ahora['hours'];
$dias = $ahora['mday'] - $dia;
$meses = $ahora['mon'] - $mes;
$anios = $ahora['year'] - $anio;

// Ajuste considerando meses de 30 días y 12 meses por año
if ($dias < 0) {
    $dias += 30;
    $meses--;
}
if ($meses < 0) {
    $meses += 12;
    $anios--;
}

echo "Han transcurrido $anios años, $meses meses, $dias días, $horas horas, $minutos minutos y $segundos segundos desde la fecha indicada\n";
?>
