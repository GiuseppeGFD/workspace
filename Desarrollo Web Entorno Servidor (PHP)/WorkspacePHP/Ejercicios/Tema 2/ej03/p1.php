<h1>RESPUESTA:<br></h1>
<?php
if (!isset($_REQUEST['nombre']) || empty($_REQUEST['nombre'])) {
    header('Location: index.php?aviso=' . "Nombre vacio, introduce tu nombre");
    exit();
} else if (isset($_REQUEST['idiomas'])) {
    $cantidad_idiomas = count($_REQUEST['idiomas']);

    $lista_idiomas = $_REQUEST['idiomas'];
    echo "<h2>" . "hola " . $_REQUEST['nombre'] . "</h2><br>";
    echo "<h3>tus idiomas favoritos son: </h3><ul>";
    foreach ($lista_idiomas as $idioma) {
        echo "<li>" . $idioma . "</li>";
    }
    echo "</ul>";

} else if ($cantidad_idiomas < 1) {
    header('Location: index.php?aviso=' . "debes elegir al menos un idioma");
    exit();
}
?>