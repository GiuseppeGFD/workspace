<?php 
/**
 * ver_carrito.php
 * Muestra la tabla del carrito y el total.
 */
session_start();
require_once "carrito_helper.php";
?>

<h1>Resumen del Carrito</h1>
<table border="1">
    <thead>
        <th>Producto</th>
        <th>Precio</th>
    </thead>
    <tbody>
<?php 
$total_compra = 0.0;
if (!empty($_SESSION["carrito"])): 
?>
    <?php foreach ($_SESSION["carrito"] as $item): ?>
        <tr>
            <td><?= htmlspecialchars($item["nombre"]) ?></td>
            <td><?= mostrarPrecio($item["precio"]) ?></td>
        </tr>
    <?php 
        $total_compra += $item["precio"];
    endforeach; 
?>
    </tbody>
    <tfoot>
        <tr>
            <td>**TOTAL**</td>
            <td>**<?= mostrarPrecio($total_compra) ?>**</td>
        </tr>
    </tfoot>
<?php else: ?>
    <tr>
        <td colspan="2">El carrito está vacío.</td>
    </tr>
<?php endif; ?>
</table>

<br>
<form action="agregar_producto.php">
    <input type="submit" value="Seguir Comprando" />
</form>