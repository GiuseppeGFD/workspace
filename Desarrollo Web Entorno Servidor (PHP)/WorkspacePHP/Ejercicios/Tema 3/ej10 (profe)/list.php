<h2>Lista de tareas</h2>
<ul>
    <?php
    session_start();
    $tareas = isset($_SESSION['tareas']) ? $_SESSION['tareas'] : [];
    foreach ($tareas as $nombre => $tareasParticulares) {
        echo '<li>';
        echo $nombre;
        echo '<ul>';
        foreach ($tareasParticulares as $tarea) {
            echo "<li>$tarea</li>";
        }
        echo '</ul>';
        echo '</li>';
    }
    ?>

</ul>
<button onclick="window.location.href='index.php'">Volver</button>