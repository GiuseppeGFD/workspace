<?php 
/**
 * agregar_producto.php
 * Formulario para añadir productos y controlar la sesión.
 */
session_start();
require_once "carrito_helper.php";

if (isset($_GET["nombre"]) && isset($_GET["precio"])) { 
    
    $_SESSION["carrito"][] = [
        "nombre" => htmlspecialchars($_GET["nombre"]),
        "precio" => (float)$_GET["precio"]
    ];

    if (isset($_GET["submit"]) && $_GET["submit"] == "Finalizar Compra"){
        header("Location: ver_carrito.php");
        exit;
    }
} else { 
    // Reinicia la lista de productos si se accede sin enviar el formulario.
    $_SESSION["carrito"] = []; 
}
?>

<h2>Añadir Producto al Carrito</h2>
<form action="agregar_producto.php">
    <label for="nombre">Nombre del Producto:</label>
    <input type="text" name="nombre" required><br><br>
    
    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" required><br><br>

    <input type="submit" value="Añadir Más" name="submit"/>
    <input type="submit" value="Finalizar Compra" name="submit"/>
</form>