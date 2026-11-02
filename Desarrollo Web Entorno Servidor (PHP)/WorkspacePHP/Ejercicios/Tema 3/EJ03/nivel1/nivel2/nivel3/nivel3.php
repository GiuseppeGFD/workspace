<?php
echo '<h1>nivel 3<h1>';

foreach ($_COOKIE as $clave => $valor) {
    echo '<p>' . $clave . '=' . $valor . '</p>';
}
?>
<a href="../../../index.php">volver</a>