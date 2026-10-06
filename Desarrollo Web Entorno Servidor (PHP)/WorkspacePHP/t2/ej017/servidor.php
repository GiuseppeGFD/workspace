<h2>Mis colores favoritos</h2>
<ul>
    <?php
    function nombreColor($inicial)
    {
        $mapa_colores = [
            'r' => 'Rojo',
            'g' => 'Verde',
            'b' => 'Blue',
        ];
        return $mapa_colores[$inicial] ?? 'Desconocido';
    }

    $lista_Colores = $_GET['color'] ?? [];

    foreach ($lista_Colores as $tipoColor) {
        $color = nombreColor($tipoColor);
        echo "<li>$color</li>";
    }

    ?>
</ul>