<?php
function conjugacion($verbo)
{
    $conjugacion = [
        'ar' => 1,
        'er' => 2,
        'ir' => 3
    ];
    return $conjugacion[substr($verbo, -2)];
}
?>