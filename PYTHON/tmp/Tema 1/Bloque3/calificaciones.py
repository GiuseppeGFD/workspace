#PRACTICA UT1 2DAW
#Giuseppe Giovanni Farhat D'elia
#18/09/2026

# Pedir datos de Matematicas
print("--- Matemáticas ---")
notaExamenMatematicas = float(input("Introduce la nota del examen: "))
actividad1Matematicas = float(input("Introduce la nota de la actividad 1: "))
actividad2Matematicas = float(input("Introduce la nota de la actividad 2: "))
actividad3Matematicas = float(input("Introduce la nota de la actividad 3: "))

# Calculo de Matematicas
mediaActividadesMatematicas = (actividad1Matematicas + actividad2Matematicas + actividad3Matematicas) / 3
notaFinalMatematicas = (notaExamenMatematicas * 0.90) + (mediaActividadesMatematicas * 0.10)

# Pedir datos de Fisica
print("\n--- Física ---")
notaExamenFisica = float(input("Introduce la nota del examen: "))
actividad1Fisica = float(input("Introduce la nota de la actividad 1: "))
actividad2Fisica = float(input("Introduce la nota de la actividad 2: "))

# Calculo de Fisica
mediaActividadesFisica = (actividad1Fisica + actividad2Fisica) / 2
notaFinalFisica = (notaExamenFisica * 0.80) + (mediaActividadesFisica * 0.20)

# Pedir datos de Quimica
print("\n--- Química ---")
notaExamenQuimica = float(input("Introduce la nota del examen: "))
actividad1Quimica = float(input("Introduce la nota de la actividad 1: "))
actividad2Quimica = float(input("Introduce la nota de la actividad 2: "))
actividad3Quimica = float(input("Introduce la nota de la actividad 3: "))

# Calculo de Quimica
mediaActividadesQuimica = (actividad1Quimica + actividad2Quimica + actividad3Quimica) / 3
notaFinalQuimica = (notaExamenQuimica * 0.85) + (mediaActividadesQuimica * 0.15)

# Calculo de la media total
mediaTotal = (notaFinalMatematicas + notaFinalFisica + notaFinalQuimica) / 3

# Mostrar resultados
print("\n========= Resultados Finales =========")
print("Nota final de Matemáticas:", notaFinalMatematicas)
print("Nota final de Física:", notaFinalFisica)
print("Nota final de Química:", notaFinalQuimica)
print("Media de las tres asignaturas:", mediaTotal)