<?php
function siguienteCaracter($c)
{
    switch ($c) {
        case '+':
            $c = '-';
            break;
        case '-':
            $c = '.';
            break;
        case '.':
            $c = '+';
            break;
    }
    return $c;
}

//==============================

echo 'Introduce n: ';
$n = readline();
$c = '.';

for ($i = $n; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        $c = siguienteCaracter($c);
        echo $c;
    }
    echo "\n";
}
?>