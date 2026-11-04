<?php
/**
 * carrito_helper.php
 * Funciones para calcular el total y formatear el precio.
 */

function calcularTotal(array $productos): float
{
    $total = 0.0;
    foreach ($productos as $producto) {
        $total += $producto['precio'];
    }
    return $total;
}

function mostrarPrecio(float $precio): string
{
    // Formatea el precio con 2 decimales y el símbolo de moneda.
    return number_format($precio, 2) . " €";
}
?>