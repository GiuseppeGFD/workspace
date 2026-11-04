<?php
require_once __DIR__ . '/../functions.php';

$verbo = isset($_POST['verbo']) ? trim($_POST['verbo']) : '';
$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

if (empty($verbo)) {
    echo "Introduce un verbo";
    exit();
}

if ($accion == 'conjugacion') {
    echo obtenerConjugacion($verbo);
} else if ($accion == 'conjugar') {
    conjugar($verbo);
}
?>