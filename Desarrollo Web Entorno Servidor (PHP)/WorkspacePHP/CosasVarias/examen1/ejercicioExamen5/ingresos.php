<?php
session_start();
require_once "ingreso_helper.php";

// Obtenemos los rangos al inicio (necesario para las funciones)
$RANGOS = getRangosIngreso(); 

// La condición de reinicio incluye verificar si no se ha enviado el formulario
if (!isset($_SESSION["ingresos"]) || !isset($_GET["submit"])) {
    $_SESSION["ingresos"] = [];
}

if (isset($_GET["ingreso"]) && isset($_GET["nombre"]) && $_GET["ingreso"] !== "") {
    
    // Guardamos el nombre y el ingreso como un array asociativo
    $_SESSION["ingresos"][] = [
        'nombre' => $_GET["nombre"],
        'ingreso' => floatval($_GET["ingreso"])
    ];

    if ($_GET["submit"] == "Mostrar resultados") {
        header("Location: resultado_ingresos.php");
        exit;
    }
}
?>

<h2>Introduce un Ingreso Anual en Euros (€)</h2>

<form>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required><br><br>
    
    <label for="ingreso">Ingreso (€):</label>
    <input type="number" name="ingreso" step="1" required><br><br>

    <input type="submit" name="submit" value="Más ingresos">
    <input type="submit" name="submit" value="Mostrar resultados">
</form>