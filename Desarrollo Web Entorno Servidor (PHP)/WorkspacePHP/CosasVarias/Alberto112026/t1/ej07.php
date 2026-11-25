<?php
echo 'Introduce mensaje: ';
$mensaje = readLine();

do {
    echo 'Introduce n (1..6): ';
    $n = readLine();
}
while ($n < 1 || $n > 6);

for ($i = 1; $i <= $n; $i++) {
    echo "<h$i>$mensaje</h$i>\n";
}
for ($i = $n - 1; $i >= 1; $i--) {
    echo "<h$i>$mensaje</h$i>\n";
}


?>