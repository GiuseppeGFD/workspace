<?php
// Datos estáticos para el primer SELECT (Marcas)
$marcas = [
    "Toyota",
    "Honda",
    "Ford",
    "BMW",
    "Tesla",
    "Fiat"
];
?>
<!DOCTYPE html>
<html lang="es">
<title>Marcas y Modelos vía AJAX</title>
<script>
function cargarModelos() {

    // 1. Obtener el valor de la marca seleccionada
    var marca = document.getElementById("marca").value;

    // 2. Crear y configurar la petición AJAX
    var ajax = new XMLHttpRequest();
    // La URL llama al script del servidor y envía la marca como parámetro
    ajax.open("GET", "modelos.php?marca=" + encodeURIComponent(marca), true);

    // 3. Definir la función de respuesta
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4 && ajax.status === 200) {
            // 4. Inyectar el HTML del SELECT de modelos en el contenedor
            document.getElementById("contenedorModelos").innerHTML = ajax.responseText;
        }
    };

    // 5. Enviar la petición
    ajax.send();
}
</script>

</head>
<body>

<h2>Selección de Vehículos (PHP + AJAX)</h2>

<label>Marca:</label>
<select id="marca" name="marca" onchange="cargarModelos()">
    <?php foreach ($marcas as $m): ?>
        <option value="<?= $m ?>"><?= $m ?></option>
    <?php endforeach; ?>
</select>

<br><br>

<div id="contenedorModelos">
    </div>

<script>
window.onload = cargarModelos;
</script>

</body>
</html>