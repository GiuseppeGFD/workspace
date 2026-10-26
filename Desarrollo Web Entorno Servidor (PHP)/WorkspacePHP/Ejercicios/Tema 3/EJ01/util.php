<?php
function generaCadenaAleatoria($longitud = 5)
{
    $charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $max = strlen($charset) - 1;
    $result = '';

    for ($i = 0; $i < $longitud; $i++) {
        $result .= $charset[random_int(0, $max)];
    }

    return $result;
}
?>