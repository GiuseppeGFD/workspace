<?php
// Array normal
$nombres = ["Giuseppe", "Dea", "Carlos"];

// Array asociativo (Clave => Valor)
$edades = [
    "Giuseppe" => 22,
    "Dea" => 21
];

// Recorrer el array asociativo con foreach
foreach ($edades as $persona => $suEdad) {
    echo $persona . " tiene " . $suEdad . " años.<br>";
}

// Para ver todo el contenido de un array de golpe en pantalla
print_r($nombres);
?>