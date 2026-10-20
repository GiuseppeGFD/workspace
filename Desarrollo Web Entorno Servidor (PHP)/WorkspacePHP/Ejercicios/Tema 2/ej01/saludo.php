<?php
if (empty($_REQUEST['nombre'])) {
    $html = <<<HTML
    <h1 style="color: red;">El campo nombre no puede estar vacío.</h1>
HTML;
} else {
    $name = $_REQUEST['nombre'];
    $html = <<<HTML
    <h2>hola $name ¡Bienvenido a PHP avanzado!</h2>
HTML;
}

echo $html;
?>