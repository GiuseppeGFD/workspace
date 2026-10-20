<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/pruebas/t2/ej09/utilHTML.php';

for ($i = 0; i <= 50; $i++) {

    if ($i % 2 == 0) {
        echo resaltar("$i");
    } else {
        echo "$i";
    }

}
?>