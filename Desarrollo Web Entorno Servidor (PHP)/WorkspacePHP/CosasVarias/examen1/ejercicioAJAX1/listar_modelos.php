<?php
$marca = $_GET['marca'];
$modelos = [
    'Toyota' => ['Corolla','Camry','Rav4'],
    'Ford' => ['Focus','Fiesta','Mustang'],
    'BMW' => ['Serie 3','X5','M4'],
];

$lista = $modelos[$marca] ?? ['Modelos no disponibles'];

$html ='';
foreach ($lista as $modelo) {
    $html .= '<option>';
    $html .= $modelo;
    $html .= '</option>';
}
echo $html; 
?>