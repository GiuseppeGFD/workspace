# 3. Análisis de resultados de un grupo
"""
Pide las calificaciones de 10 estudiantes (entre 0 y 10) y muestra
suspensos, aprobados, notables, sobresalientes, media, máximo y mínimo.
"""

TOTAL_ESTUDIANTES = 10

suspensos = 0
aprobados = 0
notables = 0
sobresalientes = 0

suma_notas = 0.0
nota_maxima = None
nota_minima = None

contador = 0

print(f"=== ANÁLISIS DE CALIFICACIONES ({TOTAL_ESTUDIANTES} ESTUDIANTES) ===\n")

while contador < TOTAL_ESTUDIANTES:
    try:
        entrada = input(f"Introduce la nota del estudiante {contador + 1}/{TOTAL_ESTUDIANTES}: ")
        nota = float(entrada)

        # La nota tiene que estar entre 0 y 10
        if nota < 0 or nota > 10:
            print("Error: La nota debe estar entre 0 y 10.\n")
            continue

        contador += 1
        suma_notas += nota

        # Guardamos la nota más alta y la más baja
        if nota_maxima is None or nota > nota_maxima:
            nota_maxima = nota
        if nota_minima is None or nota < nota_minima:
            nota_minima = nota

        # Clasificamos la nota según el baremo
        if nota < 5.0:
            suspensos += 1
        elif nota < 7.0:
            aprobados += 1
        elif nota < 9.0:
            notables += 1
        else:
            sobresalientes += 1

    except ValueError:
        print("Error: Tienes que escribir un número válido.\n")

# Calculamos la nota media del grupo
nota_media = suma_notas / TOTAL_ESTUDIANTES

print("\n--- RESULTADOS DEL GRUPO ---")
print(f"Suspensos (< 5.0):         {suspensos}")
print(f"Aprobados (5.0 - 6.9):     {aprobados}")
print(f"Notables (7.0 - 8.9):      {notables}")
print(f"Sobresalientes (>= 9.0):   {sobresalientes}")
print("----------------------------")
print(f"Nota media:                {nota_media:.2f}")
print(f"Nota más alta:             {nota_maxima:.2f}")
print(f"Nota más baja:             {nota_minima:.2f}")
print(f"Estudiantes con >= 9:      {sobresalientes}")

"""
Pruebas:
- Nota negativa (-1) o mayor que 10 (11): muestra error y pide de nuevo.
- Letras ('ocho'): captura ValueError y vuelve a pedir.
- Valores límite: 0 (mínimo), 5.0 (aprobado), 7.0 (notable), 9.0 (sobresaliente), 10.0 (máximo).
- Grupo de 10 notas varias: calcula correctamente la media, el máximo y el mínimo.
"""
