<?php
require_once 'ej09/utilHTML.php';
echo '<form>';
echo pintarRadio('colores', ['r' => 'RED', 'b' => 'GREEN', 'g' => 'BLUE'], 'b');
echo '<input type="submit"/>';
echo '</form>';
?>