<?php
session_start();
require_once "helper.php";

// Obtenemos los rangos para poder llamar a tablaTemperaturas.
$RANGOS = getRangosTemperatura();
$lista = $_SESSION["temps"];
?>

<h1>Listado de temperaturas registradas</h1>

<?= tablaTemperaturas($lista, $RANGOS) ?>

<br><br>

<form action="temperaturas.php">
    <input type="submit" value="Volver">
</form>