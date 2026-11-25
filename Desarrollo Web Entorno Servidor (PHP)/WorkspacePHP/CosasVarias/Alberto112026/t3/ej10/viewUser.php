<?php
session_start();
?>

<h2>Lista de tareas de <?= $_GET['user'] ?></h2>

<ul>
    <?php
    $tareas = isset($_SESSION['tareas'][$_GET['user']]) ? $_SESSION['tareas'][$_GET['user']] : [];
    foreach ($tareas as $tarea) {
        echo "<li>$tarea</li>";
    }
    ?>
    <li><b><?= $_GET['task'] ?> (NUEVO)</b></li>
</ul>

<button onclick="window.location.href='index.php'">Volver</button>

<?php
$tareas[] = $_GET['task'];
$_SESSION['tareas'][$_GET['user']] = $tareas;
?>