<?php
if (isset($_COOKIE["veces"])) {

    $veces = (int) $_COOKIE["veces"] + 1; // suma contador (casting a int desde str)

    setcookie("veces", $veces, time() + 10); // nombre,=veces,tiempo de vida 10s

    echo <<<HTML
        <h1>Esta no es tu primera vez aquí</h1>
        <p>Has venido aquí $veces veces</p>
    HTML;

} else {

    setcookie("veces", 1, time() + 10); // nombre,=veces,tiempo de vida 10s
    echo <<<HTML
    <h1>Es tu primera vez aquí</h1>
    HTML;

}
?>