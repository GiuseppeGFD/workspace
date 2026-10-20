<form action="p1.php" method="get">
    <label>Nombre </label><input type="text" name="nombre" placeholder="Nombre.." /><br>
    <input type="checkbox" name="idiomas[]" value="Alemán" checked> Aleman<br>
    <input type="checkbox" name="idiomas[]" value="Inglés"> ingles <br>
    <input type="checkbox" name="idiomas[]" value="Español"> español <br>
    <input type="checkbox" name="idiomas[]" value="Francés"> frances <br>
    <input type="checkbox" name="idiomas[]" value="Italiano"> italiano <br>
    <input type="submit" value="enviar">
</form>
<?php
if (isset($_REQUEST['aviso'])) {
    $aviso = $_REQUEST['aviso'];
    echo "<h2>" . $aviso . "</h2>";
}
?>