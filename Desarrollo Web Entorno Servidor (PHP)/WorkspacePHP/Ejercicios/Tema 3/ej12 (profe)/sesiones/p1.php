<?php
session_start();
session_destroy();
session_start();
?>
<form action="p2.php">
    Indica el número de sumandos (2..15)
    <input type="number" min="2" max="15" value="3" name="sumandos" />
    <br />

    <input type="submit" />
</form>