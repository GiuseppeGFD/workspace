<?php 
/**
 * registrar_notas.php
 * Procesa el formulario (usando GET) y gestiona el reinicio de la lista.
 */
session_start();
require_once "notas_helper.php";

// Si se encuentran datos en $_GET (significa que se envió el formulario).
if (isset($_GET["nombre"]) && isset($_GET["nota1"])) { 
    
    // Almacenamos el nuevo alumno con sus notas en la sesión.
    $_SESSION["alumnos"][] = [
        "nombre" => htmlspecialchars($_GET["nombre"]),
        "notas"  => [ (float)$_GET["nota1"], (float)$_GET["nota2"], (float)$_GET["nota3"] ]
    ];

    // Si se pulsa "Ver Resumen", redirige a la tabla.
    if (isset($_GET["submit"]) && $_GET["submit"] == "Ver Resumen"){
        header("Location: resumen_alumnos.php");
        exit;
    }
} else { 
    // Si NO hay datos en $_GET (carga inicial o simple recarga de la página),
    // se reinicia la lista de alumnos en la sesión.
    $_SESSION["alumnos"] = []; 
}
?>

<h2>Registro de Notas de Alumnos</h2>
<form method="GET" action="registrar_notas.php">
    <label for="nombre">Nombre del Alumno:</label>
    <input type="text" name="nombre" required><br><br>

    <label for="nota1">Nota P1:</label>
    <input type="number" step="0.01" name="nota1" required><br>
    
    <label for="nota2">Nota P2:</label>
    <input type="number" step="0.01" name="nota2" required><br>
    
    <label for="nota3">Nota P3:</label>
    <input type="number" step="0.01" name="nota3" required><br><br>

    <input type="submit" value="Añadir Alumno" name="submit"/>
    <input type="submit" value="Ver Resumen" name="submit"/>
</form>