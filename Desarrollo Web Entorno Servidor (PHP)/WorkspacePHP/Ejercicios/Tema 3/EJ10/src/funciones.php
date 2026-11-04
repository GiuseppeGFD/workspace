<?php
session_start();
function verAccion()
{
    if (isset($_POST['accion'])) {
        $ver = $_POST['accion'];
        if ($ver == 'añadirTarea') {
            header('Location: añadirTarea.php');
            exit();
        } else if ($ver == 'verTarea') {
            header('Location: verTarea.php');
            exit();
        }
    }

}
function selectEmpleados()
{
    require_once('bbdd/users.php');
    echo '<select name=nombreUsuario>';
    foreach ($db as $indice => $usuario) {
        echo '<option value=' . $usuario . '>' . $usuario . '</opcion>';
    }
    echo '</select>';
}

function añadirTarea()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['nombreTarea']) && !empty($_POST['nombreUsuario'])) {
            $empleado = $_POST['nombreUsuario'];
            $tarea = $_POST['nombreTarea'];
            $_SESSION[$empleado][] = $tarea;

            echo '<h3>Tareas de: ' . $empleado . '</h3>';
            echo '<ul>';

            foreach ($_SESSION[$empleado] as $index => $tareaGuardada) {
                if ($tareaGuardada === $tarea) {
                    echo '<li><strong>' . $tareaGuardada . '</strong> (Nuevo)</li>';
                } else {
                    echo '<li>' . $tareaGuardada . '</li>';
                }
            }

            echo '</ul>';

        } else {
            echo '<p style="color:red;">Campo vacio o no seleccionado</p>';
        }
    }
}

function volver()
{
    echo '<form action="../../index.php">';
    echo '<input type="submit" value="volver">';
    echo '</form>';
}

function verTareas()
{
    require_once('bbdd/users.php');
    echo '<ul>';
    foreach ($db as $index => $usuario) {
        if (isset($_SESSION[$usuario])) {
            echo '<li>' . $usuario . '<ul>';
            foreach ($_SESSION[$usuario] as $indice => $tarea) {
                echo '<li>' . $tarea . '</li>';
            }
            echo '</ul></li>';
        }
    }


    echo '</ul>';
}
?>