<form action="p3.php">
    Selecciona una opción<br />
    <?php
    $numeros = [
        'Uno',
        'Dos',
        'Tres',
        'Cuatro',
        'Cinco',
        'Seis',
        'Siete',
        'Ocho',
        'Nueve',
        'Diez',
        'Once',
        'Doce',
        'Trece',
        'Catorce',
        'Quince'
    ];
    $nRadios = $_GET['nRadios'];
    for ($i = 1; $i <= $nRadios; $i++) {
        $checked = $i == 1 ? 'checked="checked"' : '';
        echo <<<HTML
    
    <input id="id-$i" type="radio" name="n" value="$i" $checked/>
    <label for="id-$i">{$numeros[$i - 1]}</label>
    <br />
HTML;
    }
    ?>
    <input type="submit" />
</form>