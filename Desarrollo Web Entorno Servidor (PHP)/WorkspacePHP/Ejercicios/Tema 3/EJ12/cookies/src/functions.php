<?php
function recibirCantidadSumandos()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['cantidadsumandos']) && !empty($_POST['cantidadsumandos'])) {
            setcookie('cantidadsumandos', $_POST['cantidadsumandos']);
            setcookie('sumandosRecibidos', '');
            setcookie('sumandos', '');
            if (headers_sent()) {
                echo '<script>window.location.href="page2.php";</script>';
            } else {
                header('Location: page2.php');
            }
            exit();
        } else {
            echo '<p style="color:red;padding:10px;">Error: valor recibido erroneo</p>';
        }
    }
}

function controlarSumandosPedidos()
{
    if (!isset($_COOKIE['sumandosRecibidos']) || empty($_COOKIE['sumandosRecibidos'])) {
        $vez = 1;
        setcookie('sumandosRecibidos', 1);
        $_COOKIE['sumandosRecibidos'] = 1;
        echo '<h2>Introduce el sumando numero ' . $vez . ' (1-10)</h2>';
    } else {
        $vez = (int) $_COOKIE['sumandosRecibidos'] + 1;
        setcookie('sumandosRecibidos', $vez);
        $_COOKIE['sumandosRecibidos'] = $vez;
        if (isset($_COOKIE['cantidadsumandos']) && $vez <= (int) $_COOKIE['cantidadsumandos']) {
            echo '<h2>Introduce el sumando numero ' . $vez . ' (1-10)</h2>';
        }
    }
}

function recibirSumandos()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['numero']) && !empty($_POST['numero'])) {
            if (isset($_COOKIE['sumandos']) && !empty($_COOKIE['sumandos'])) {
                $array = unserialize($_COOKIE['sumandos']);
                $array[] = $_POST['numero'];
                setcookie('sumandos', serialize($array));
                $_COOKIE['sumandos'] = serialize($array);
            } else {
                $array = [$_POST['numero']];
                setcookie('sumandos', serialize($array));
                $_COOKIE['sumandos'] = serialize($array);
            }
        }
    }
}

function pedirSumandos()
{
    controlarSumandosPedidos();

    if (isset($_COOKIE['cantidadsumandos']) && !empty($_COOKIE['cantidadsumandos'])) {
        if ((int) $_COOKIE['sumandosRecibidos'] <= (int) $_COOKIE['cantidadsumandos']) {
            echo '<form action="" method="post">';
            echo '<input type="number" min="1" max="10" name="numero" placeholder="Introduce un numero">';
            echo '<input type="submit" value="enviar" >';
            echo '</form>';
        } else {
            if (headers_sent()) {
                echo '<script>window.location.href="page3.php";</script>';
            } else {
                header('Location: page3.php');
            }
            exit();
        }
    }
}

function sumar()
{
    if (isset($_COOKIE['sumandos']) && !empty($_COOKIE['sumandos'])) {
        $html = '';
        $sumandos = unserialize($_COOKIE['sumandos']);
        $suma = 0;
        foreach ($sumandos as $indice => $numero) {
            if (($indice + 1) == (count($sumandos))) {
                $html .= $numero . ' = ';
            } else {
                $html .= $numero . ' + ';
            }
            $suma = $suma + $numero;
        }
        $html .= $suma;
        echo $html;
    }
}
?>