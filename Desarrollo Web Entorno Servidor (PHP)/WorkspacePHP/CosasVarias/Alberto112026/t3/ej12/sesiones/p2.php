<?php
session_start();
if (!isset($_SESSION['sumandos'])) { // Primera vez
    $_SESSION['sumandos'] = $_GET['sumandos'];
    $_SESSION['sumando'] = 1;
    $_SESSION['numeros'] = [];
} else { // Resto de veces
    $_SESSION['sumando']++;
    $_SESSION['numeros'][] = $_GET['numero'];
    if ($_SESSION['sumando'] > $_SESSION['sumandos']) {
        header('Location:p3.php');
    }
}
?>
<form action="p2.php">
    <h3>Introduce el sumando número <?= $_SESSION['sumando'] ?> (1..10)</h3>
    <br />
    <input type="number" min="1" max="10" value="5" name="numero" />
    <br />
    <input type="submit" />
</form>