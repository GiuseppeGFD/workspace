<?php
$min = "zzzzzzzzzzzzzzzzz";
$max = "a";
do {
    echo "\nIntroduce n: ";
    $n = readline();
    if ($n != 0) {
        $min = ($n >= $min) ? $min : $n;
        $max = ($n <= $max) ? $max : $n;
    }
}
while ($n != 0);

echo "Mínimo: $min\n";
echo "Máximo: $max";
?>