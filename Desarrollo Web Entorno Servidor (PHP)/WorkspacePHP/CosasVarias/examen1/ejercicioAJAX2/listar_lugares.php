<?php
$ciudad = $_GET['ciudad'];
$lugares_interes = [
    'Madrid' => ['Museo del Prado','Parque del Retiro','Plaza Mayor'],
    'París' => ['Torre Eiffel','Museo del Louvre','Arco del Triunfo'],
];

// Usamos $lista para obtener la lista específica o una lista genérica si no existe.
$lista = $lugares_interes[$ciudad] ?? ['Plaza Principal','Edificio Histórico','Parque Local'];

$html ='';
foreach ($lista as $lugar) {
    $html .= '<option>';
    $html .= $lugar;
    $html .= '</option>';
}
echo $html; 
?>