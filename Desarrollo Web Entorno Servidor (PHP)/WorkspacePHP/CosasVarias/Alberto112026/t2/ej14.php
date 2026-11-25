<form action="servidor.php">
    <?php
    require_once 'ej09/utilHTML.php';
    echo pintarSelect('country', ['sp' => 'España', 'uk' => 'Inglaterra', 'fr' => 'Francia'], 'fr');
    ?>

    <input type="submit" />
</form>