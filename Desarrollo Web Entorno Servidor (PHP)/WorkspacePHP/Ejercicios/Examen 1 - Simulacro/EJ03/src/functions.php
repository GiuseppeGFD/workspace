<?php
require_once __DIR__ . '/../../EJ01/src/functions.php';

function obtenerConjugacion($verbo)
{
    $verbo = trim(strtolower($verbo));
    $final = substr($verbo, -2);

    if ($final == 'ar') {
        return "1ª conjugación";
    } else if ($final == 'er') {
        return "2ª conjugación";
    } else if ($final == 'ir') {
        return "3ª conjugación";
    }

    return "Por favor, introduce un verbo terminado en ar, er o ir.";
}
?>
