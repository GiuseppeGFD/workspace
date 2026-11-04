<?php 
session_start();
require_once "instrumento_helper.php";
?>

<h1>Repertorio de Instrumentos</h1>
<table border="1">
    <thead>
        <th>Instrumento</th>
        <th>Familia</th>
        <th>Tesitura</th>
    </thead>
    <tbody>
<?php if (!empty($_SESSION["instrumentos"])): ?>
    <?php foreach ($_SESSION["instrumentos"] as $i): ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= clasificarFamilia($i) ?></td>
            <td><?= listarTesitura($i) ?></td> 
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="3">No hay instrumentos en el repertorio.</td>
    </tr>
<?php endif; ?>
    </tbody>
</table>

<br>
<form action="agregar_instrumento.php">
    <input type="submit" value="Añadir más instrumentos" />
</form>