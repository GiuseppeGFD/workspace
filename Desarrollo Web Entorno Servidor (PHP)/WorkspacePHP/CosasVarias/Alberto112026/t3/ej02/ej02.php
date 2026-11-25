<?php

$primera_vez = !isset($_COOKIE['veces']);
if ($primera_vez) {
    echo <<<HTML
    <h1>Bienvenido</h1>
HTML;
    setcookie('veces', '1');
} else {
    $veces = $_COOKIE['veces'];
    $veces++;
    setcookie('veces', $veces);
    echo <<<HTML
    <h1>Hola amigo</h1>
    <p>Es la $veces ª vez que te veo por aquí</p>
HTML;
}
?>