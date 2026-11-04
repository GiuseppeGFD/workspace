<?php
session_start();
require_once "helper.php";

// Obtenemos los rangos UNA SOLA VEZ al inicio.
$RANGOS = getRangosTemperatura(); 

if (!isset($_SESSION["temps"]) || !isset($_GET["submit"])) {
    $_SESSION["temps"] = [];
}

if (isset($_GET["temp"]) && isset($_GET["ciudad"]) && $_GET["temp"] !== "") {
    $_SESSION["temps"][] = [
        'ciudad' => $_GET["ciudad"],
        'temp' => floatval($_GET["temp"])
    ];

    if ($_GET["submit"] == "Mostrar resultados") {
        header("Location: resultado.php");
        exit;
    }
}
?>

<h2>Introduce una temperatura en °C</h2>

<form>
    <label for="ciudad">Ciudad:</label>
    <input type="text" name="ciudad" required><br><br>
    
    <label for="temp">Temperatura (°C):</label>
    <input type="number" name="temp" step="0.1" required><br><br>

    <input type="submit" name="submit" value="Más temperaturas">
    <input type="submit" name="submit" value="Mostrar resultados">
</form>