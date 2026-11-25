<?php
echo 'Introduce n: ';
$n = readline();

echo "\n";

echo 'Introduce p: ';
$p = readline();

for ($i=1; $i<=$n;$i++) {
    for ($j=0;$j<=$p-1;$j++) {
        echo $j . ' ';
    }
}
?>