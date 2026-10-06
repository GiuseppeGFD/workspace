# Ejercicio 5: Saltar determinados valores
"""
Recorre los números del 1 al 20.
Muestra todos los números excepto aquellos que sean divisibles entre 4.
Debes utilizar continue para saltar las iteraciones correspondientes
a los números que no quieres mostrar.
"""

print("Mostrando números del 1 al 20 (omitiendo divisibles entre 4):")

for numero in range(1, 21):
    if numero % 4 == 0:
        continue  # Salta la iteración actual para no mostrar este número
    print(numero)
