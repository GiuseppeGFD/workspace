<?php
// ==============================================================================
function resaltar($texto)
{
    return "<h1>$texto</h1>";
}
// ==============================================================================
function pintarRadio($nombre, $arrayValueLabel, $seleccionado)
{
    $html = '';
    foreach ($arrayValueLabel as $value => $label) {
        $select = $seleccionado == $value ? 'checked="checked"' : '';
        $html .= "<input id=\"r-$value\" type=\"radio\" name=\"$nombre\" value=\"$value\" $select/>";
        $html .= "<label for=\"r-$value\">$label</label>";
        $html .= "<br/>\n";
    }
    return $html;
}
// ==============================================================================
function pintarCheckboxes($nombre, $arrayValueLabel, $seleccionados)
{
    $html = '';
    foreach ($arrayValueLabel as $value => $label) {
        $select = in_array($value, $seleccionados) ? 'checked="checked"' : '';
        $html .= <<<HTML
        <input id="r-$value" type="checkbox" name="{$nombre}[]" value="$value" $select/>
        <label for="r-$value">{$label}</label>
        <br/>
HTML;
    }
    return $html;
}
// ==============================================================================
function pintarSelect($name, $arrayValueLabel, $seleccionado)
{
    $html = "<select name=\"$name\">\n";
    foreach ($arrayValueLabel as $value => $label) {
        $selected = (($value == $seleccionado) ? 'selected="selected"' : '');
        $html .= <<<HTML
    <option value="$value" $selected>
        $label
    </option>

HTML;
    }
    $html .= "\n</select>";
    return $html;
}
?>