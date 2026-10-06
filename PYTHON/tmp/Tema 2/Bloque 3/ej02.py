# Ejercicio 2: Primer número que supera un límite
"""
Recorre los múltiplos de 10 desde 10 hasta 100 utilizando for y range().
Muestra los números mientras sean menores o iguales que 60.
Cuando encuentres el primer número superior a 60, muestra un mensaje
indicándolo y utiliza break para terminar el bucle.
"""

for numero in range(10, 101, 10):
    if numero > 60:
        print(f"Se ha alcanzado el primer número superior a 60: {numero}. Fin del bucle.")
        break
    print(numero)
