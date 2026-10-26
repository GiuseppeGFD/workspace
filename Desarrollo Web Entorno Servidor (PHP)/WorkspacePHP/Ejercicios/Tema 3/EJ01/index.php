<?php require_once('util.php');

if (!isset($_COOKIE['UID'])) {
    $primeraVez = true;
    $id = generaCadenaAleatoria(5);
    $veces = 1;

    setcookie('UID', $id);
    setcookie('veces', $veces);
} else {
    $primeraVez = false;
    $id = $_COOKIE['UID'];
    $veces = isset($_COOKIE['veces']) ? $_COOKIE['veces'] + 1 : 1;
    setcookie('veces', $veces);
}
?>

<?php if ($primeraVez): ?>
    <h1>Hola desconocido. A partir de ahora te recordaré.</h1>
<?php else: ?>
    <h1>¡Hola de nuevo! Te conozco como UID <?= $id ?></h1>
    <h3>Esta es tu vez número <?= $veces ?> en esta página</h3>
<?php endif; ?>