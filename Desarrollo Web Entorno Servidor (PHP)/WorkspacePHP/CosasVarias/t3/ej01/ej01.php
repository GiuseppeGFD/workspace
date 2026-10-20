<?php
if (isset($_COOKIE["veces"])) {
    echo <<<HTML
    <h1>Buenos Días</h1>
    <h2>Esta no es tu primera vez aquí</h2>
    HTML;
} else {
    setcookie("primeravez", "1", time() + 3600, );
    echo <<<HTML
    <h1>Buenos Días</h1>
    <h2>Te ficharé</h2>
    HTML;
}
?>