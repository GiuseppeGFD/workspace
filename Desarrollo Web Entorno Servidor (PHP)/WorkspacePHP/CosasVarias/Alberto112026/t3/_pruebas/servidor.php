<?php
if (isset($_COOKIE['zapatillas'])) {
    $modelo = $_COOKIE['zapatillas'];
    echo <<<HTML
<h1>Hola amigo</h1>
<p>Sé que te gustan las zapatillas $modelo</p>
HTML;
} else {
    echo <<<HTML
    <h1>Hola desconocido</h1>
    <p>A partir de ahora te tengo fichado</p>
HTML;
}

if (isset($_GET['marca'])) {
    setcookie('zapatillas', $_GET['marca']);
} else {
    setcookie('zapatillas', 'ninguna');
}

echo '<h3><a href="cliente.php">Volver a cliente</a></h3>';
?>