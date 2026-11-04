<?php
// Define y retorna los rangos de clasificación
function getRangosIngreso(): array
{
    return [
        "Bajo" => ["min" => 0, "max" => 15000],
        "Medio-Bajo" => ["min" => 15001, "max" => 30000],
        "Medio-Alto" => ["min" => 30001, "max" => 60000],
        "Alto" => ["min" => 60001, "max" => 150000],
        "Elite" => ["min" => 150001, "max" => 9999999]
    ];
}

// Clasifica el ingreso usando los rangos
function categoriaIngreso(float $ingreso, array $rangos): string
{
    foreach ($rangos as $tipo => $rango) {
        if ($ingreso >= $rango["min"] && $ingreso <= $rango["max"]) {
            return $tipo;
        }
    }
    return "No aplica";
}

// Genera la tabla completa con resultados
// El argumento $lista ahora contiene arrays con ['nombre'] e ['ingreso']
function tablaIngresos(array $lista, array $rangos): string
{
    $html = "<table border='1'>
                <tr>
                    <th>Nombre</th>
                    <th>Ingreso Anual (€)</th>
                    <th>Nivel Económico</th>
                </tr>";
    
    foreach ($lista as $datos) {
        $cat = categoriaIngreso($datos['ingreso'], $rangos); 
        $ingreso_f = number_format($datos['ingreso'], 2, ',', '.') . " €";
        $nombre = htmlspecialchars($datos['nombre']);
        
        $html .= "<tr><td>$nombre</td><td>$ingreso_f</td><td>$cat</td></tr>";
    }
    return $html . "</table>";
}
?>