<h2>Datos recibidos</h2>
<ul>
    <?php
    foreach ($_REQUEST as $k => $v) {
        echo "<li>($k) $v</li>\n";
    }

    ?>
</ul>