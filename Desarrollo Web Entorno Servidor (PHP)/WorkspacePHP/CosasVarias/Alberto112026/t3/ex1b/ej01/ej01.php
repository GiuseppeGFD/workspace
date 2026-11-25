<?php
function conjugar($verbo, $tipo)
{
    $html = '';
    $conjugacion = substr($verbo, -2);
    $desinencias = [
        'presente_indicativo' =>
            [
                'ar' => ['o', 'as', 'a', 'amos', 'áis', 'an'],
                'er' => ['o', 'es', 'e', 'emos', 'eis', 'en'],
                'ir' => ['o', 'es', 'e', 'imos', 'is', 'en']
            ],
        'preterito_imperfecto' =>
            [
                'ar' => ['aba', 'abas', 'aba', 'ábamos', 'abáis', 'aban'],
                'er' => ['ía', 'ías', 'ía', 'íamos', 'íais', 'ían'],
                'ir' => ['ía', 'ías', 'ía', 'íamos', 'íais', 'ían']
            ]
    ];
    $raiz = substr($verbo, 0, -2);
    $html .= "<select>\n";
    foreach ($desinencias[$tipo][$conjugacion] as $d) {
        $html .= "\t<option>";
        $html .= $raiz . $d;
        $html .= "</option>\n";
    }
    $html .= "\n</select>\n";
    return $html;
}


?>