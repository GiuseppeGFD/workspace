<form action="" method="post">
    <h2>Introduce los datos</h2>
    <label>Nombre</label>
    <input type="text" name="nombre" placeholder="Nombre:"><br>
    <ol style="list-style: none; padding: 0;">
        <caption>Deportes</caption>
        <li><input type="checkbox" name="deportes[]" value="Futbol"><label>Futbol</label></li>
        <li><input type="checkbox" name="deportes[]" value="Baloncesto"><label>Baloncesto</label></li>
        <li><input type="checkbox" name="deportes[]" value="Tenis"><label>Tenis</label></li>
        <li><input type="checkbox" name="deportes[]" value="Voleyball"><label>Voleyball</label></li>
    </ol>
    <select multiple name="ciudades[]">
        <option value="Madrid">Madrid</option>
        <option value="Barcelona">Barcelona</option>
        <option value="Valencia">Valencia</option>
        <option value="Sevilla">Sevilla</option>
    </select><br><br>
    <input type="submit" value="Enviar" focus="focus">
</form>

<?php if (!isset($_POST['nombre']) || empty($_POST['nombre'])): ?>
    <p style="color:red;">El nombre es un campo obligatorio, no puede estar vacio</p>
<?php endif; ?>

<?php if (isset($_POST['nombre']) || !empty($_POST['nombre'])): ?>
    <?php $nombre = $_POST['nombre']; ?>
<?php endif; ?>

<?php if (!isset($_POST['deportes']) || empty($_POST['deportes'])): ?>

    <?php $textoDeportes = "No hay Ningun deporte seleccionado,"; ?>

<?php elseif (isset($_POST['deportes'])):
    $textoDeportes = "";
    foreach ($_POST['deportes'] as $deporte): ?>

        <?php $textoDeportes = $textoDeportes . $deporte . ", "; ?>

    <?php endforeach;
endif; ?>

<?php if (!isset($_POST['ciudades']) || empty($_POST['ciudades'])): ?>

    <?php $textoCiudad = "No hay ninguna ciudad seleccionada,"; ?>

<?php elseif (isset($_POST['ciudades'])):
    $textoCiudad = "";
    foreach ($_POST['ciudades'] as $ciudad): ?>

        <?php $textoCiudad = $textoCiudad . $ciudad . ", "; ?>

    <?php endforeach;
endif; ?>

<h3>Resumen:</h3>
<p>Hola
    <?= $nombre ?? '' ?>, <?= $textoCiudad ?? '' ?><?= $textoDeportes ?? '' ?>
</p>