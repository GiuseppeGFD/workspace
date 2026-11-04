<?php
function conjugar($verbo)
{
    $conjugaciones = [
        'ar' => ['o', 'as', 'amos', 'ais', 'aremos'],
        'er' => ['o', 'es', 'emos', 'iais', 'eremos'],
        'ir' => ['o', 'es', 'imos', 'is', 'remos']
    ];

    $final = substr($verbo, -2);
    $inicio = substr($verbo, 0, -2);

    if (!isset($conjugaciones[$final])) {
        echo "Por favor, introduce un verbo terminado en ar, er o ir.";
        return;
    }

    echo '<select>';
    foreach ($conjugaciones[$final] as $sufijo) {
        echo '<option>' . $inicio . $sufijo . '</option>';
    }
    echo '</select>';
}
?>