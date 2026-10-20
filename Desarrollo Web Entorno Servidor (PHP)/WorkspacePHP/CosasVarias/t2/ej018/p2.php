<h1>Números</h1>

<form action="p3.php" method="get">
    <?php
    $numeros = isset($_GET['radios']) ? (int) $_GET['radios'] : 1;
    $nombre = ['cero', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve', 'diez', 'once', 'doce', 'trece', 'catorce', 'quince'];
    $impresion = "";

    for ($i = 1; $i <= $numeros; $i++) {
        $checked = $i == 1 ? "checked=\"checked\"" : "";
        $impresion .= "<label><input type='radio' name='seleccion' value='$i' $checked> $nombre[$i]</label><br>";
    }

    echo $impresion;
    ?>
    <input type="submit" value="Enviar a p3">
</form>