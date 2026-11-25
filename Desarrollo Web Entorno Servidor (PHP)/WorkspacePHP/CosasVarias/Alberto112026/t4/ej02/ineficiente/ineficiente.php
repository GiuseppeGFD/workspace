<?php
$ccaa_seleccionada = isset($_GET['ccaa']) ? $_GET['ccaa'] : 'Andalucía';
$ccaa = [
    'Andalucía' => ['Almería', 'Cádiz', 'Córdoba', 'Granada', 'Huelva', 'Jaén', 'Málaga', 'Sevilla'],
    'Aragón' => ['Huesca', 'Teruel', 'Zaragoza'],
    'Asturias (Principado de)' => ['Asturias'],
    'Canarias' => ['Palmas (Las)', 'Santa Cruz de Tenerife'],
    'Cantabria' => ['Cantabria'],
    'Castilla y León' => ['Ávila', 'Burgos', 'León', 'Palencia', 'Salamanca', 'Segovia', 'Soria', 'Valladolid', 'Zamora'],
    'Castilla-La Mancha' => ['Albacete', 'Ciudad Real', 'Cuenca', 'Guadalajara', 'Toledo'],
    'Cataluña' => ['Barcelona', 'Gerona', 'Lérida', 'Tarragona'],
    'Ceuta (Ciudad de)' => ['Ceuta'],
    'Comunidad Valenciana' => ['Alicante', 'Castellón', 'Valencia'],
    'Extremadura' => ['Badajoz', 'Cáceres'],
    'Galicia' => ['Coruña (La)', 'Lugo', 'Orense', 'Pontevedra'],
    'Islas Baleares' => ['Islas Baleares'],
    'Madrid (Comunidad de)' => ['Madrid'],
    'Melilla (Ciudad de)' => ['Melilla'],
    'Murcia (Región de)' => ['Murcia'],
    'Navarra (Comunidad Foral de)' => ['Navarra'],
    'País Vasco' => ['Álava', 'Guipúzcoa', 'Vizcaya'],
    'Rioja (La)' => ['Rioja (La)']
];
$comunidades = array_keys($ccaa);
$provincias = $ccaa[$ccaa_seleccionada];
?>
<h1>Comunidades autónomas (Ineficiente)</h1>

<form id="idForm" action="ineficiente.php">
    ccaa
    <select onchange="document.getElementById('idForm').submit()" name="ccaa">
        <?php foreach ($comunidades as $comunidad): ?>
            <option <?= $comunidad == $ccaa_seleccionada ? 'selected="selected"' : '' ?>> <?= $comunidad ?></option>
        <?php endforeach; ?>
    </select>
    <br />

    provincias
    <select>
        <?php foreach ($provincias as $provincia): ?>
            <option> <?= $provincia ?></option>
        <?php endforeach; ?>

    </select>
</form>
<h3>Escoge una comunidad autónoma</h3>
<p>Observa el cambio de provincias (recargando TODO desde el servidor)</p>
<br />
<button onclick="window.location.href='../index.php'">Menú</button>