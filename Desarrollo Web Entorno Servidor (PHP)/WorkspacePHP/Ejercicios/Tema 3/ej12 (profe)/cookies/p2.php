<?php
$sumandos = isset($_COOKIE['sumandos']) ? $_COOKIE['sumandos'] : null;
$sumando = isset($_COOKIE['sumando']) ? $_COOKIE['sumando'] : 1;
$numeros = isset($_COOKIE['numeros']) ? unserialize($_COOKIE['numeros']) : [];

if ($sumandos != null && $sumando > $sumandos) {
    header('Location:p3.php');
}

if ($sumandos == null) { // Es la primera vez
    setcookie('sumandos', $_GET['sumandos']);
    setcookie('sumando', 2);
    setcookie('numeros', serialize([]));
} else {
    setcookie('sumando', $sumando + 1);
    $numeros[] = $_GET['numero'];
    setcookie('numeros', serialize($numeros));
}
?>
<form action="p2.php">
    <h3>Introduce el sumando número <?= $sumando ?> (1..10)</h3>
    <br />
    <input type="number" min="1" max="10" value="5" name="numero" />
    <br />
    <input type="submit" />
</form>