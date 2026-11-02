<?php
// PHP en AJAX: No imprime <!DOCTYPE html>, solo el trozo de dato
$nombre = isset($_GET['nombre']) ? htmlspecialchars(trim($_GET['nombre'])) : 'Desconocido';

$saludos = ["Hola $nombre", "Que tal $nombre?", "Que pasa $nombre!!"];
$etiquetas = ["h1", "h2", "h3"];

$saludo_aleatorio = $saludos[array_rand($saludos)];
$etiqueta = $etiquetas[array_rand($etiquetas)];

echo "<$etiqueta>$saludo_aleatorio</$etiqueta>";
?>