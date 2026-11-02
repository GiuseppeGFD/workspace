<?php
/**
 * LIBRERIA DE FUNCIONES GLOBALES
 * Incluye este archivo al principio de tus scripts: require_once '../funciones_globales.php';
 */

// 1. OBTENER PARAMETROS SEGUROS
function obtenerParametro($nombre, $porDefecto = "") {
    return isset($_REQUEST[$nombre]) ? htmlspecialchars(trim($_REQUEST[$nombre])) : $porDefecto;
}

// 2. GENERADOR DE HTML (utilHTML)
function pintarSelect($nombre, $opciones, $seleccionado = "") {
    $html = "<select name='" . $nombre . "'>\n";
    foreach ($opciones as $valor => $etiqueta) {
        $sel = ($valor == $seleccionado) ? " selected='selected'" : "";
        $html .= "  <option value='" . $valor . "'" . $sel . ">" . $etiqueta . "</option>\n";
    }
    $html .= "</select>\n";
    return $html;
}

// 3. CONJUGADOR DE EXAMEN
function conjugarVerbo($verbo) {
    $verbo = strtolower(trim($verbo));
    $terminacion = substr($verbo, -2);
    $raiz = substr($verbo, 0, -2);
    
    $sufijos = [];
    if ($terminacion == "ar") $sufijos = ["o", "as", "a", "amos", "ais", "an"];
    elseif ($terminacion == "er") $sufijos = ["o", "es", "e", "emos", "eis", "en"];
    elseif ($terminacion == "ir") $sufijos = ["o", "es", "e", "imos", "is", "en"];
    else return "<span style='color:red;'>Verbo no valido</span>";
    
    $html = "<select name='conjugacion_" . $verbo . "'>\n";
    foreach ($sufijos as $s) {
        $html .= "  <option value='" . $raiz . $s . "'>" . $raiz . $s . "</option>\n";
    }
    $html .= "</select>\n";
    return $html;
}
?>