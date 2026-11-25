<?php
require_once 'ej09/utilHTML.php';
for ($i = 1; $i <= 50; $i++) {
    if ($i % 2 == 0) {
        echo "$i<br/>";
    } else {
        echo resaltar($i);
    }
}
?>