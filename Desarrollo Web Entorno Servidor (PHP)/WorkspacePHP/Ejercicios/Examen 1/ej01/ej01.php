<?php
function conjugar($verbo)
{
    $html = '';
    $conjugacion = substr($verbo, -2);
    $raiz = substr($verbo, 0, -2);

    $desinencias1 = [
        'ar' => ['o', 'as', 'a', 'amos', 'ais', 'an'],
        'er' => ['o', 'es', 'e', 'amos', 'ais', 'en'],
        'ir' => ['o', 'es', 'e', 'imos', 'is', 'an']
    ];

    $html .= "<select>";
    foreach ($desinencias1[$conjugacion] as $d) {
        $html .= "\n<option>";
        $html .= $raiz . $d;
        $html .= "</option>\n";
    }
    $html .= "</select>\n";
    return $html;
}
?>