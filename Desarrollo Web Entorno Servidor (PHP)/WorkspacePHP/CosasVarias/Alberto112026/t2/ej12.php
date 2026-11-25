<?php
require_once 'ej09/utilHTML.php';
echo "<form>\n";
echo pintarCheckboxes('colores', ['r' => 'RED', 'g' => 'GREEN', 'b' => 'BLUE'], ['g']);
echo "<input type=\"submit\"/>\n";
echo "</form>\n";
?>