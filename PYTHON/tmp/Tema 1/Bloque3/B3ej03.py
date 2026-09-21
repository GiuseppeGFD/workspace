#La calificación final se obtiene con un 55 % 
# de la media de tres parciales, un 30 % del 
# examen final y un 15 % del proyecto final. 
# Solicita las cinco calificaciones y calcula la nota final.

parcial1 = float(input("nota primer parcial: "))
parcial2 = float(input("nota segundo parcial: "))
parcial3 = float(input("nota tercer parcial: "))
examenFinal = float(input("Nota del examen Final: "))
proyecto = float(input("Nota final proyecto"))

notaFinal = (((parcial1+parcial2+parcial3)/3)*0.55)+(examenFinal*0.30)+(proyecto*0.15)
print(f"Nota final:{notaFinal}")