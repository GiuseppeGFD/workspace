<?php
function counterVisits()
{
    session_start();
    if (!isset($_SESSION['visitas']) or empty($_SESSION['visitas'])) {
        $_SESSION['visitas'] = 1;
        $html = <<<HTML
        <h1>Bienvenido a la pagina nuevo usuario</h1>
        HTML;
        echo $html;
    } else {
        $_SESSION['visitas'] = $_SESSION['visitas'] + 1;
        $visitas = $_SESSION['visitas'];
        $html = <<<HTML
        <h1>Bienvenido a la pagina, esta es tu $visitas ª aqui</h1>
        HTML;
        echo $html;
    }
}

?>