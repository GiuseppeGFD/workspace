<?php
function autenticar()
{
    if (isset($_POST['datoUsuario']) && !empty($_POST['datoUsuario'])) {

        $array = $_POST['datoUsuario'];
        $username = $array[0];
        $password = $array[1];

        if ($username == 'admin' && $password == 'admin123') {

            if (!isset($_COOKIE['arrayUser'])) {

                $arrayUser = [$username, $password, 1];
                setcookie('arrayUser', serialize($arrayUser));
                header('Location: logged.php');
                exit();

            } else {

                $arrayUser = unserialize($_COOKIE['arrayUser']);
                $arrayUser[2] = $arrayUser[2] + 1;
                setcookie('arrayUser', '', time() - 1);
                setcookie('arrayUser', serialize($arrayUser));
                header('Location: logged.php');
                exit();

            }
        } else {
            setcookie('error', 'Usuario o contraseña incorrecto');
        }
    }

}

function obtenerNombre()
{
    if (isset($_COOKIE['arrayUser']) && !empty($_COOKIE['arrayUser'])) {
        $arrayUser = unserialize($_COOKIE['arrayUser']);
        $nombre = $arrayUser[0];
        $veces = $arrayUser[2];
        echo '<p>Conctado como ' . '<strong>' . $nombre . '</strong>. Número de visitas: ' . $veces;
    }
}

function verificarErrores()
{

    if (isset($_COOKIE['error']) && !empty($_COOKIE['error'])) {
        $html = '<p style=color:red;>' . $_COOKIE['error'] . '</p>';
        setcookie('error', $_COOKIE['error'], time() - 3600);
        return $html;
    } else {
        return '';
    }
}

function mostrarSelect()
{
    $html = <<<HTML
    <label>
    <input type='checkbox' value=''><img src='../../assets/img/france.png' style='width: 20px;height: 20px;'>
    </label>
    <input type='checkbox' ><img src='../../assets/img/spain.png' style='width: 20px;height: 20px;'>
    <input type='checkbox' ><img src='../../assets/img/usa.png' style='width: 20px;height: 20px;'>
HTML;

    echo $html;
}
?>