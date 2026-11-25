<?php
session_start();
if (isset($_SESSION['verbos']) && $_GET['verbo']) {
    $_SESSION['verbos'][] = $_GET['verbo'];
} else {
    $_SESSION['verbos'] = [];
}

if (isset($_GET['accion']) && $_GET['accion'] == 'Conjugar') {
    header('Location:p2.php');
}
?>
<form action="p1.php">
    <h2>Introduce un verbo</h2>
    <input type="text" name="verbo" autofocus="autofocus" />
    <br />
    <input type="submit" value="Más verbos" name="accion" />
    <input type="submit" value="Conjugar" name="accion" />
</form>