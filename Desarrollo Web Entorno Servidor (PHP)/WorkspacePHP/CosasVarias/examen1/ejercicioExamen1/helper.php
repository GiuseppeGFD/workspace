<?php
// Define y retorna los rangos de clasificación.
function getRangosTemperatura(): array
{
    return [
        "Muy frío" => ["min" => -50, "max" => 5],
        "Frío" => ["min" => 6, "max" => 15],
        "Templado" => ["min" => 16, "max" => 25],
        "Calor" => ["min" => 26, "max" => 35],
        "Muy calor" => ["min" => 36, "max" => 60]
    ];
}

// Recibe los rangos como argumento.
function categoriaTemp(float $temp, array $rangos): string
{
    foreach ($rangos as $tipo => $rango) {
        if ($temp >= $rango["min"] && $temp <= $rango["max"]) {
            return $tipo;
        }
    }
    return "Desconocido";
}

// Recibe los rangos como argumento.
function selectCategorias(array $rangos): string
{
    $html = "<select>";
    foreach ($rangos as $tipo => $rango) {
        $html .= "<option>$tipo ({$rango['min']}°C - {$rango['max']}°C)</option>";
    }
    return $html . "</select>";
}

// Recibe la lista de datos y los rangos como argumento.
function tablaTemperaturas(array $lista, array $rangos): string
{
    $html = "<table border='1'>
                <tr>
                    <th>Ciudad</th>
                    <th>Temperatura (°C)</th>
                    <th>Categoría</th>
                </tr>";
    foreach ($lista as $t) {
        // Llama a categoriaTemp pasando los rangos.
        $cat = categoriaTemp($t['temp'], $rangos);
        $html .= "<tr>
                    <td>" . htmlspecialchars($t['ciudad']) . "</td>
                    <td>{$t['temp']}</td>
                    <td>$cat</td>
                  </tr>";
    }
    return $html . "</table>";
}
?>