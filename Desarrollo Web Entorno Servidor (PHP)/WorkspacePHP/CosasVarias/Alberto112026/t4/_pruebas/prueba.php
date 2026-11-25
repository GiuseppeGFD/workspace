<?php
require_once 'oo.php';
$i = new Cosa();
if ($i instanceof Instrumento) {
    $i->sonar();
} else {
    echo 'No es un instrumento';
}
?>