<?php
session_start();
function recibirCantidadSumandos()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['cantidadSumandos']) && !empty($_POST['cantidadSumandos'])) {
            $_SESSION['cantidadSumandos'] = $_POST['cantidadSumandos'];
            $_SESSION['sumandos'] = [];
            header('Location: page2.php');
            exit();
        } else {
            echo '<p style="color:red;">ERROR: Campo vacio o dato incorrecto</p>';
        }
    }
}

function recibirSumandos()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['numero']) && !empty(($_POST['numero']))) {
            $_SESSION['sumandos'][] = $_POST['numero'];
        }
    }
}

function preguntarSumandos()
{
    if (count($_SESSION['sumandos']) < $_SESSION['cantidadSumandos']) {
        echo 'Guardados' . count($_SESSION['sumandos']) . 'cantidad:' . $_SESSION['cantidadSumandos'];
        echo '<h2>Introduce un numero</h2>';
        echo '<form action="" method="post">';
        echo '<label>Sumando<input type="number" name="numero" placeholder="Introducir numero"><br></label>';
        echo '<input type="submit" value="enviar">';
        echo '</form>';
    } else {
        header('Location: page3.php');
        exit();
    }
}

function sumarSumandos()
{
    if (isset($_SESSION['cantidadSumandos']) && isset($_SESSION['sumandos']) && ($_SESSION['cantidadSumandos'] == count($_SESSION['sumandos']))) {

        $numeros = $_SESSION['sumandos'];
        $html = '<p style="color:blue;">';
        $suma = 0;

        foreach ($numeros as $index => $numero) {
            $html .= $index + 1 == $_SESSION['cantidadSumandos'] ? ($numero . ' = ') : ($numero . ' + ');
            $suma = $suma + $numero;
        }
        $html .= $suma . '</p>';
        echo $html;
    }

}

?>