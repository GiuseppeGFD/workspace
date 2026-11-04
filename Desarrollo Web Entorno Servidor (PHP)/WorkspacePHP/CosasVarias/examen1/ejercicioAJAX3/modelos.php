<?php
// Base de datos de modelos por marca
$modelos = [
    "Toyota" => ["Corolla", "Camry", "RAV4", "Prius"],
    "Honda" => ["Civic", "Accord", "CR-V", "Pilot"],
    "Ford" => ["Focus", "Mustang", "F-150", "Explorer"],
    "BMW" => ["Serie 3", "Serie 5", "X3", "iX"],
    "Tesla" => ["Model 3", "Model Y", "Model S"],
    "Fiat" => ["500", "Panda", "Tipo"]
];

// Obtener la marca enviada por el cliente (AJAX)
// Usamos el operador de fusión null (??) para evitar errores si no se envía el parámetro
$marca = $_GET["marca"] ?? "";

// Fallback si la marca no existe en el array
if (!isset($modelos[$marca])) {
    echo "<select><option value=''>Modelo no disponible</option></select>";
    exit;
}

// 1. Generar el SELECT HTML
echo "<label>Modelo:</label>";
echo "<select name='modelo'>";

// 2. Llenar el SELECT con los modelos correspondientes
foreach ($modelos[$marca] as $m) {
    echo "<option value='$m'>$m</option>";
}

echo "</select>";
?>