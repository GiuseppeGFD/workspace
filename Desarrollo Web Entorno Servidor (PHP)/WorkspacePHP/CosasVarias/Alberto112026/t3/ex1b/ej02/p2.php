<?php
session_start();
$verbos = $_SESSION['verbos'];
session_destroy();
require_once 'util.php';
require_once '../ej01/ej01.php';
//require_once '../ej01/ej01mock.php';
?>
<h1>Lista de verbos</h1>
<table border="1">
    <thead>
        <th>Infinitivo</th>
        <th>Conjugación</th>
        <th>Presente de indicativo</th>
        <th>Pretérito imperfecto</th>
    </thead>
    <tbody>

        <?php foreach ($verbos as $verbo): ?>
            <tr>
                <td><?= $verbo ?></td>
                <td><?= conjugacion($verbo) ?></td>
                <td><?= conjugar($verbo, 'presente_indicativo') ?></td>
                <td><?= conjugar($verbo, 'preterito_imperfecto') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br />
<button onclick="window.location.href='p1.php'">Volver a introducir verbos</button>