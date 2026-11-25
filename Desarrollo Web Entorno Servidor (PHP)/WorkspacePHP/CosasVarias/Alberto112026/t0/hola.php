<?php
$a = ['a' => 1, 'b' => 2, 'c' => 3];
$cadena = serialize($a);
$c = unserialize($cadena);
foreach ($c as $k => $v) {
    echo "$k $v\n";
}
?>