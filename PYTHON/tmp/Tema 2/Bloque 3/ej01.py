# Ejercicio 1: Detener una búsqueda
"""
Recorre los números del 50 al 1 utilizando un bucle.
Debes encontrar el primer número divisible entre 11.
Cuando lo encuentres, muestra un mensaje indicando cuál es
y utiliza break para terminar el bucle.
"""

print("Buscando el primer número divisible entre 11 en cuenta regresiva desde 50...")

for numero in range(50, 0, -1):
    if numero % 11 == 0:
        print(f"¡Encontrado! El primer número divisible entre 11 es: {numero}")
        break
