<?php 
session_start();
require_once "instrumento_helper.php";

if (isset($_GET["instrumento"])) { 
    $_SESSION["instrumentos"][] = htmlspecialchars($_GET["instrumento"]);

    if (isset($_GET["submit"]) && $_GET["submit"] == "Ver Repertorio"){
        header("Location: tabla_instrumentos.php");
        exit;
    }
} else { 
    $_SESSION["instrumentos"] = []; 
}
?>

<h2>Añadir Instrumento Musical</h2>
<form action="agregar_instrumento.php">
    <label for="instrumento">Nombre del Instrumento:</label>
    <input type="text" name="instrumento" required><br><br>

    <input type="submit" value="Añadir Instrumento" name="submit"/>
    <input type="submit" value="Ver Repertorio" name="submit"/>
</form>