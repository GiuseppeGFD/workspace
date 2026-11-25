<?php
$a = [];
$a['ana'] = ['t1', 't2'];
$a['pepe'] = ['tp1', 'tp2', 'tp3'];
$a['juan'] = [];
foreach ($a as $k => $v) {
    echo "$k => ";
    foreach ($v as $e) {
        echo "$e ";
    }
    echo "\n";
}
?>