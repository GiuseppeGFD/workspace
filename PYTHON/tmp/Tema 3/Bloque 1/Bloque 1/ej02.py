# Ejercicio 2. Estadísticas de un partido de baloncesto

def calcular_diferencia_puntos(puntos_local, puntos_visitante): # Calcula la diferencia de puntos
    if puntos_local >= puntos_visitante:
        return puntos_local - puntos_visitante
    else:
        return puntos_visitante - puntos_local

def obtener_resultado(puntos_local, puntos_visitante): # Determina el ganador o empate
    if puntos_local > puntos_visitante:
        return "Victoria del equipo local"
    elif puntos_visitante > puntos_local:
        return "Victoria del equipo visitante"
    else:
        return "Empate"

def mostrar_resultado_partido(equipo_local, puntos_local, equipo_visitante, puntos_visitante): # Muestra el marcador
    print("Resultado del partido")
    print(f"{equipo_local}: {puntos_local}")
    print(f"{equipo_visitante}: {puntos_visitante}")

def main():
    # Datos del partido
    equipo_local = "Real Madrid"
    puntos_local = 85
    equipo_visitante = "Barcelona"
    puntos_visitante = 78

    # Mostramos el marcador
    mostrar_resultado_partido(equipo_local, puntos_local, equipo_visitante, puntos_visitante)

    # Calculamos el resultado y la diferencia
    resultado = obtener_resultado(puntos_local, puntos_visitante)
    diferencia = calcular_diferencia_puntos(puntos_local, puntos_visitante)

    print()
    print(f"Resultado: {resultado}")
    print(f"Diferencia de puntos: {diferencia}")

if __name__ == '__main__':
    main()
