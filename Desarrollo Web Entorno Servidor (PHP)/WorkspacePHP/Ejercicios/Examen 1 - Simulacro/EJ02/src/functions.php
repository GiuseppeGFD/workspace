<?php
session_start();
require_once __DIR__ . '/../../EJ01/src/functions.php';
function introduceVerbos()
{
    echo '<form action="" method="post">';
    echo '<label>Introduce un verbo <input type="text" name="verbo" placeholder="Introduce un verbo"><br></label>';
    echo '<input type="submit" name="mas_verbos" value="mas_verbos">';
    echo '<input type="submit" name="conjugar" value="conjugar">';
    echo '</form>';
}

function añadirVerbo()
{
    if (isset($_POST['verbo']) && !empty($_POST['verbo'])) {
        $_SESSION['verbos'][] = $_POST['verbo'];
    }
}
function controlarAccion()
{
    añadirVerbo();
    if (isset($_POST['conjugar']) && !empty($_POST['conjugar'])) {
        añadirVerbo();
        header('Location: page2.php');
        exit();
    }
}

function mostrarConjucacion()
{
    if (count($_SESSION['verbos']) > 0) {
        $verbos = $_SESSION['verbos'];
        foreach ($verbos as $verbo) {
            conjugar($verbo);
        }
    } else {
        echo '<p>error</p>';
    }

}

?>