<?php
/**
 * resumen_alumnos.php
 * Muestra la tabla usando los datos de $_SESSION.
 */
session_start();
require_once "notas_helper.php"; 
?>

<h1>Resumen de Notas de Alumnos</h1>
<table border="1">
    <thead>
        <tr>
            <th>Alumno</th>
            <th>Notas (P1, P2, P3)</th>
            <th>Media</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
<?php if (!empty($_SESSION["alumnos"])): ?>
    <?php foreach ($_SESSION["alumnos"] as $alumno): ?>
        <?php 
            $media = calcularMedia($alumno["notas"]);
            $estado = estado($media);
            $notas_str = implode(", ", $alumno["notas"]); 
        ?>
        <tr>
            <td><?= htmlspecialchars($alumno["nombre"]) ?></td>
            <td><?= $notas_str ?></td>
            <td><?= number_format($media, 2) ?></td>
            <td><?= $estado ?></td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
        <tr>
            <td colspan="4">No hay alumnos registrados.</td>
        </tr>
<?php endif; ?>
    </tbody>
</table>

<br>
<form action="registrar_notas.php">
    <input type="submit" value="Introducir más alumnos" />
</form>