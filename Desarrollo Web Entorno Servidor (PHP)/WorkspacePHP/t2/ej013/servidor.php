<?php
foreach ($_REQUEST as $nombre => $valor) {
    if (empty($valor)) {
        echo "<h4>($nombre) vacío</h4>";
    } else {
        echo "<h4>($nombre) $valor</h4>";
    }
}
?>