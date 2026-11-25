<?php
require_once __DIR__ . '/../../EJ02/src/functions.php';
function conjugarVerbo($verbo)
{
    $conjugaciones = [
        'Presente' => [
            'ar' => ['o', 'as', 'a', 'amos', 'áis', 'an'],
            'er' => ['o', 'es', 'e', 'emos', 'éis', 'en'],
            'ir' => ['o', 'es', 'e', 'imos', 'ís', 'en']
        ],
        'Pasado' => [
            'ar' => ['é', 'aste', 'ó', 'amos', 'asteis', 'aron'],
            'er' => ['í', 'iste', 'ió', 'imos', 'isteis', 'ieron'],
            'ir' => ['í', 'iste', 'ió', 'imos', 'isteis', 'ieron']
        ],
        'Futuro' => [
            'ar' => ['aré', 'arás', 'ará', 'aremos', 'aréis', 'arán'],
            'er' => ['eré', 'erás', 'erá', 'eremos', 'eréis', 'erán'],
            'ir' => ['iré', 'irás', 'irá', 'iremos', 'iréis', 'irán']
        ]
    ];

    $personas = ['Yo', 'Tú', 'Él/Ella', 'Nosotros', 'Vosotros', 'Ellos/Ellas'];

    $terminacion = substr($verbo, -2);
    $raiz = substr($verbo, 0, -2);

    if (!isset($conjugaciones['Presente'][$terminacion])) {
        echo "El verbo debe terminar en -ar, -er o -ir.<br>";
        return;
    }

    echo "Conjugación del verbo: " . strtoupper($verbo) . "<br><br>";

    // Recorrer e imprimir directamente cada tiempo verbal
    foreach ($conjugaciones as $tiempo => $grupo) {
        echo "--- $tiempo ---<br>";

        $desinencias = $grupo[$terminacion];
        foreach ($desinencias as $i => $desinencia) {
            echo $personas[$i] . " " . $raiz . $desinencia . "<br>";
        }

        echo "<br>";
    }
}
?>