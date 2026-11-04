<?php
session_start();
require_once "ingreso_helper.php";

$RANGOS = getRangosIngreso(); 
$lista = $_SESSION["ingresos"];
?>

<h1>Listado de Ingresos Registrados</h1>

<?= tablaIngresos($lista, $RANGOS) ?>

<br><br>

<form action="ingresos.php">
    <input type="submit" value="Volver">
</form>