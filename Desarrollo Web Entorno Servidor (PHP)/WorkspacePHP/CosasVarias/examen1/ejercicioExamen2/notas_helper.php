<?php
/**
 * notas_helper.php
 * Funciones para calcular la media y el estado del alumno.
 */

function calcularMedia(array $notas): float
{
    // Suma las notas y divide por la cantidad.
    return empty($notas) ? 0.0 : array_sum($notas) / count($notas);
}

function estado(float $media): string
{
    // Retorna Aprobado si la media es 5 o más.
    return ($media >= 5.0) ? "Aprobado" : "Suspenso";
}
?>