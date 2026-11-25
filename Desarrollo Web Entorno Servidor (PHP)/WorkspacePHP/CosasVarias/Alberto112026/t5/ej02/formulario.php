<?php
require_once __DIR__ . '/../utilDB.php';
$db = conectarMySQL();
$productos = $db->query('select nombre,precio from producto');
?>
<h1>Inserción de productos</h1>
<form action="insertar.php">
    Nombre
    <input type="text" name="nombre" />
    <br />

    Precio
    <input type="text" name="precio" />
    <br />

    <input type="submit" />
</form>

<table border="1">
    <thead>
        <th>Nombre</th>
        <th>Precio</th>
    </thead>

    <tbody>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= $producto['nombre'] ?></td>
                <td><?= $producto['precio'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>