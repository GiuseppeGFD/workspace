<?php
$bd = [
    ['Nombre' => 'Pepe', 'Apellido' => 'García', 'Teléfono' => '637 654 654'],
    ['Nombre' => 'Ana', 'Apellido' => 'García', 'Teléfono' => '637 111 654'],
    ['Nombre' => 'Manolo', 'Apellido' => 'González', 'Teléfono' => '637 654 654']
];

$filas_seleccionadas = [];
foreach ($bd as $fila) {
    if (str_contains($fila[$_GET['tipo']], $_GET['filtro'])) {
        $filas_seleccionadas[] = $fila;
    }
}

$html = '';
foreach ($filas_seleccionadas as $fila) {
    $html .= '<tr>' .
        '<td>' . $fila['Nombre'] . '</td>' .
        '<td>' . $fila['Apellido'] . '</td>' .
        '<td>' . $fila['Teléfono'] . '</td>' .
        '</tr>';
}
echo $html;
?>