<?php
require_once('../UTIL/util.php');
echo '<h1>EJERCICIO 1 - BBDD PHP</h1>';

$base = conectarMySQL();

$sql = <<<SQL
    
    CREATE TABLE IF NOT EXISTS producto(
        nombre varchar(15) NOT NULL primary key,
        precio smallint NOT NULL
    )
SQL;

$base->exec($sql);
echo '<p>Conectado a BBDD</p>' . PHP_EOL;

// Procesar formulario e insertar
if (isset($_POST['nombre']) && isset($_POST['precio'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    $insert = $base->prepare("INSERT INTO producto (nombre, precio) VALUES (:nombre, :precio)");
    $insert->execute([
        ':nombre' => $nombre,
        ':precio' => $precio
    ]);

    echo "<p>Producto <strong>$nombre</strong> ($precio €) insertado correctamente.</p>";
}
?>

<form action="" method="post">
    <input type="text" name="nombre" placeholder="Nombre del producto" required>
    <input type="number" name="precio" placeholder="Precio del producto" required>
    <input type="submit" value="Guardar producto">
</form>

<?php

// 1. Corregimos el SQL (quitamos el guion y añadimos *)
$sql = <<<SQL
SELECT * FROM producto;
SQL;

// 2. Usamos query() para obtener los datos
$resultado = $base->query($sql);

// 3. Recorremos cada fila y la mostramos
while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
    echo $fila['nombre'] . ""; // Cambia 'nombre' por la columna que quieras mostrar
    echo $fila['precio'] . "<br>"; // Cambia 'nombre' por la columna que quieras mostrar

}

echo 'FIN';
?>