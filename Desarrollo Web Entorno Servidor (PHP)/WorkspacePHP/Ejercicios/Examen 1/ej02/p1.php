<?php
session_start();
if (isset($_GET['verbos']) && $_GET['verbo']) {
    $_SESSION['verbos'][] = $_GET['verbo'];

} else {
    $_SESSION['verbos'] = [];
}
if (isset($_GET['accion']) && $_GET['accion'] == 'conjugar') {
    header('Location:p2.php')
}

?>

<form action="p2.php">
    <input type="text" name="verbo" />
    <br />
    <input type="submit" name="accion" value="Más verbos" />
    <input type="submit" name="accion" value="conjugar" />
</form>