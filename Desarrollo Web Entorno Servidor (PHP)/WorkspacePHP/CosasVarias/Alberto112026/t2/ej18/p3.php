<h3>Resultado final</h3>
<?php
$n = $_GET['n'];
$resultado = $n + 2;
echo <<<HTML
<h1>$n + 2 = $resultado</h1>
HTML;
?>