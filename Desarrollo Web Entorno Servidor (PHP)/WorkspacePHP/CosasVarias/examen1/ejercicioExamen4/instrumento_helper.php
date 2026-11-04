<?php
function clasificarFamilia(string $instrumento): string
{
    // Array con más instrumentos para clasificación
    $familias = [
        "Violin" => "Cuerda Frotada",
        "Trompeta" => "Viento Metal",
        "Piano" => "Cuerda Percutida",
        "Flauta" => "Viento Madera",
        "Guitarra" => "Cuerda Pulsada",
        "Clarinete" => "Viento Madera",
        "Tuba" => "Viento Metal",
        "Bateria" => "Percusión",
        "Contrabajo" => "Cuerda Frotada",
        "Saxofon" => "Viento Madera",
        "Organo" => "Viento Teclado",
        "Timbal" => "Percusión",
        "Arpa" => "Cuerda Pulsada"
    ];
    return $familias[$instrumento] ?? "Desconocida";
}

function listarTesitura(string $instrumento): string
{
    // Array anidado con los detalles de tesitura
    $tesituras = [
        "Violin" => ["Rango" => "G3 - A7", "Clave" => "Sol", "Afinación" => "GDAE"],
        "Trompeta" => ["Rango" => "E3 - D6", "Clave" => "Sol", "Afinación" => "Sib"],
        "Piano" => ["Rango" => "A0 - C8", "Clave" => "Doble", "Afinación" => "C"],
        "Flauta" => ["Rango" => "C4 - D7", "Clave" => "Sol", "Afinación" => "C"],
        "Guitarra" => ["Rango" => "E2 - E6", "Clave" => "Sol", "Afinación" => "Estándar"],
        "Clarinete" => ["Rango" => "D3 - C7", "Clave" => "Sol", "Afinación" => "Sib"],
        "Tuba" => ["Rango" => "D0 - G4", "Clave" => "Fa/Do", "Afinación" => "Fa/Sib"],
        "Bateria" => ["Rango" => "Indefinido", "Clave" => "N/A", "Afinación" => "Parches"],
        "Contrabajo" => ["Rango" => "E1 - C5", "Clave" => "Fa", "Afinación" => "EADG"],
        "Saxofon" => ["Rango" => "Bb3 - F6", "Clave" => "Sol", "Afinación" => "Mib/Sib"],
        "Organo" => ["Rango" => "Variable", "Clave" => "Doble", "Afinación" => "Tono fijo"],
        "Arpa" => ["Rango" => "C1 - G7", "Clave" => "Doble", "Afinación" => "Pedales"]
    ];

    if (!isset($tesituras[$instrumento])) {
        return "Tesitura no detallada.";
    }

    $select = "<select>";
    foreach ($tesituras[$instrumento] as $propiedad => $valor) {
        $select .= "<option>{$propiedad}: {$valor}</option>";
    }
    return $select . "</select>";
}
?>