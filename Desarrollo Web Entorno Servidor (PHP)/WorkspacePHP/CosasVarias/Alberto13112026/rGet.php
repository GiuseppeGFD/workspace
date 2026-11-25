<?php
require_once '../../lib/rb.php';
R::setup('mysql:host=localhost;dbname=test', 'root', '');
$personas = R::findAll('persona');
?>

<h2>Lista de personas</h2>
<button onclick='window.location.href="cGet.php"'>Crear</button>
<table border="1">
    <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Teléfono</th>
        <th>Editar</th>
        <th>Borrar</th>
    </thead>

    <tbody>
        <?php foreach ($personas as $persona): ?>
            <tr>
                <td><?= $persona->nombre ?></td>
                <td><?= $persona->apellido ?></td>
                <td><?= $persona->telefono ?></td>
                <td>
                    <button onclick="window.location.href='uGet.php?id=<?= $persona->id ?>'">
                        <img src="img/lapiz.png" height="20" width="20" />
                    </button>
                </td>
                <td>
                    <form id="idFormBorrar" action="dPost.php" method="post">
                        <input type="hidden" name="id" value="<?= $persona->id ?>" />

                        <button onclick="document.getElementById('idFormBorrar').submit()">
                            <img src="img/trash.jpg" height="20" width="20" />
                        </button>
                    </form>

                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>