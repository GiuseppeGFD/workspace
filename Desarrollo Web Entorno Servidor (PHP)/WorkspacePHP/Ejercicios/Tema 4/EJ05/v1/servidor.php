<?php
$BBDD = [
    'persona1' => [
        'nombre' => 'Ana',
        'apellido' => 'García',
        'telefono' => '643654655'
    ],
    'persona2' => [
        'nombre' => 'Luis',
        'apellido' => 'Pérez',
        'telefono' => '612345678'
    ],
    'persona3' => [
        'nombre' => 'Juan',
        'apellido' => 'Alberto',
        'telefono' => '643632455'
    ],
    'persona4' => [
        'nombre' => 'María',
        'apellido' => 'López',
        'telefono' => '654321987'
    ],
    'persona5' => [
        'nombre' => 'Carlos',
        'apellido' => 'Sánchez',
        'telefono' => '678901234'
    ],
    'persona6' => [
        'nombre' => 'Laura',
        'apellido' => 'Martínez',
        'telefono' => '699887766'
    ],
    'persona7' => [
        'nombre' => 'David',
        'apellido' => 'Gómez',
        'telefono' => '611223344'
    ],
    'persona8' => [
        'nombre' => 'Elena',
        'apellido' => 'Fernández',
        'telefono' => '622334455'
    ],
    'persona9' => [
        'nombre' => 'Jorge',
        'apellido' => 'Ruiz',
        'telefono' => '633445566'
    ],
    'persona10' => [
        'nombre' => 'Lucía',
        'apellido' => 'Díaz',
        'telefono' => '644556677'
    ],
    'persona11' => [
        'nombre' => 'Pedro',
        'apellido' => 'Álvarez',
        'telefono' => '655667788'
    ],
    'persona12' => [
        'nombre' => 'Carmen',
        'apellido' => 'Moreno',
        'telefono' => '666778899'
    ],
    'persona13' => [
        'nombre' => 'Miguel',
        'apellido' => 'Muñoz',
        'telefono' => '677889900'
    ],
    'persona14' => [
        'nombre' => 'Sara',
        'apellido' => 'Romero',
        'telefono' => '688990011'
    ],
    'persona15' => [
        'nombre' => 'Alejandro',
        'apellido' => 'Alonso',
        'telefono' => '699001122'
    ],
    'persona16' => [
        'nombre' => 'Paula',
        'apellido' => 'Gutiérrez',
        'telefono' => '610112233'
    ],
    'persona17' => [
        'nombre' => 'Diego',
        'apellido' => 'Navarro',
        'telefono' => '620223344'
    ],
    'persona18' => [
        'nombre' => 'Marta',
        'apellido' => 'Torres',
        'telefono' => '630334455'
    ],
    'persona19' => [
        'nombre' => 'Javier',
        'apellido' => 'Domínguez',
        'telefono' => '640445566'
    ],
    'persona20' => [
        'nombre' => 'Sofía',
        'apellido' => 'Vázquez',
        'telefono' => '650556677'
    ]
];


if (isset($_REQUEST['inputFiltro']) && isset($_REQUEST['filtro']) && !empty($_REQUEST['inputFiltro']) && !empty($_REQUEST['filtro'])) {
    echo '<table><thead><tr><td>Nombre</td><td>Apellido</td><td>Teléfono</td></tr></thead><tbody>';
    foreach ($BBDD as $persona => $datos) {
        echo '<tr>';
        foreach ($datos as $clave => $valor) {
            if (str_contains(strtolower($datos[$_REQUEST['filtro']]), strtolower($_REQUEST['inputFiltro']))) {
                echo '<td>' . $valor . '</td>';
            }
        }
        echo '</tr>';
    }
    echo '<tbody></table>';
} else {
    echo 'ERROR: Debes introducir valores o escoger que apartado deseas filtrar';
}

?>