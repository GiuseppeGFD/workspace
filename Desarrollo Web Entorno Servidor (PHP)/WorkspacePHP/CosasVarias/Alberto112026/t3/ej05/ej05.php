<?php
session_start();
if (isset($_SESSION['veces'])) {
    $_SESSION['veces']++;
    echo <<<HTML
    <h1>Hola amigo</h1>
    <h3>Es la {$_SESSION['veces']}ª vez que te veo por aquí</h3>
HTML;


} else {
    echo <<<HTML
<h1>Bienvenido (sesiones)</h1>
<h3>Es la primera vez que te veo por aquí</h3>
HTML;
    $_SESSION['veces'] = 1;
}
?>