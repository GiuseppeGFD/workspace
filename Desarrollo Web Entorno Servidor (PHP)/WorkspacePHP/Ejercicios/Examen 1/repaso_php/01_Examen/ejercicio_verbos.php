<?php
/**
 * EXAMEN 1 EVALUACION: Tabla de verbos
 * PATRON: Logica (PHP) arriba, Vista (HTML) abajo.
 */
session_start();
require_once '../funciones_globales.php';

// 1. INICIALIZACION
if (!isset($_SESSION['verbos'])) {
    $_SESSION['verbos'] = [];
}

// 2. LOGICA FORMULARIO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = obtenerParametro('accion');
    
    if ($accion === 'Mas verbos' || $accion === 'Conjugar') {
        $nuevoVerbo = obtenerParametro('verbo');
        if (!empty($nuevoVerbo)) {
            $_SESSION['verbos'][] = $nuevoVerbo;
        }
    }
    
    if ($accion === 'Volver a introducir verbos') {
        $_SESSION['verbos'] = []; // Borra datos
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Examen Verbos</title>
    <style>
        body { font-family: sans-serif; }
        .caja { border: 2px solid #b00; padding: 15px; display: inline-block; }
        table { border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; }
    </style>
</head>
<body>
    <!-- 3. VISTA HTML -->
    <div class="caja">
        <?php if (empty($_SESSION['verbos']) || (isset($accion) && $accion !== 'Conjugar')): ?>
            
            <h3>Introduce un verbo</h3>
            <form action="" method="POST">
                <input type="text" name="verbo" required autofocus>
                <br><br>
                <input type="submit" name="accion" value="Mas verbos">
                <input type="submit" name="accion" value="Conjugar">
            </form>

        <?php elseif (isset($accion) && $accion === 'Conjugar'): ?>

            <h3>Lista de verbos</h3>
            <table>
                <tr>
                    <th>Infinitivo</th>
                    <th>Presente de indicativo</th>
                </tr>
                <?php foreach ($_SESSION['verbos'] as $v): ?>
                <tr>
                    <td><?php echo htmlspecialchars($v); ?></td>
                    <td><?php echo conjugarVerbo($v); ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <br>
            <form action="" method="POST">
                <input type="submit" name="accion" value="Volver a introducir verbos">
            </form>

        <?php endif; ?>
    </div>
</body>
</html>