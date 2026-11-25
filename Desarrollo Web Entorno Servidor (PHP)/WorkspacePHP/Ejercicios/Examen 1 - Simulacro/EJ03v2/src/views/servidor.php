<?php
//require_once __DIR__ . '/../../../EJ02/src/functions.php';
require_once __DIR__ . '/../functions.php';

function obtenerConjugacion($verbo)
{
    $conjugacion = substr($verbo, -2);
    switch ($conjugacion) {
        case 'ar':
            echo 'Primera Conjugacion'
            ;
            break;
        case 'er':
            echo 'Segunda Conjugacion'
            ;
            break;
        case 'ir':
            echo 'Tercera Conjugacion'
            ;
            break;
        default:
            echo 'Error, verbo no valido';
    }
}

if (isset($_POST['accion']) && !empty($_POST['accion'])) {
    if ($_POST['accion'] == 'conjugar') {

        if (isset($_POST['verbo']) && !empty($_POST['verbo'])) {
            conjugarVerbo($_POST['verbo']);
        }

    } else if ($_POST['accion'] == 'conjugacion') {
        if (isset($_POST['verbo']) && !empty($_POST['verbo'])) {
            obtenerConjugacion($_POST['verbo']);
        }
    }
}
?>