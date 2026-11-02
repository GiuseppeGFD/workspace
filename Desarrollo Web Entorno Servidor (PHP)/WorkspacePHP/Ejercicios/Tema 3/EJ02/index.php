<?php
if (isset($_COOKIE['veces'])) {
    $veces = $_COOKIE['veces'] + 1;
    setcookie('veces', $veces);
    echo '<center><h1>Bienvenido</h1><p>Esta es la ' . $veces . 'ª vez que visitas esta página</p></center>';
} else {
    setcookie('veces', 1);
    echo '<center><h1>BIENVENIDO</h1><p>Esta es tu primera vez aquí</p></center>';
}
?>