<?php
function resaltar($texto)
{
    return "<h1>$texto</h1>";
}

function pintarRadio($nombre, $arrayValueLabel, $seleccionado)
{
    valor="";
    foreach ($arrayValueLabel as $id => $valor) {
    $valor="<input type=\"radio\" name=\"$valor\"
    }
}
?>