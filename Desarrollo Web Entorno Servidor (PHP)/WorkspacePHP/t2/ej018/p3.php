<h2>Resultado</h2>
<?php
$numero = isset($_GET['seleccion']) ? $_GET['seleccion'] : '0';
echo $numero . " + " . 2 . " = " . $numero + 2;

?>