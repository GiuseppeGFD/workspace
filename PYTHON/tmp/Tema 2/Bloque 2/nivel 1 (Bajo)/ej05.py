# Suma de números
"""Pide un número entero positivo n y 
calcula la suma de todos los números desde 1 hasta n.
Debes utilizar un acumulador."""

# Ejemplo: si n = 5, el resultado debe ser 15, porque 1 + 2 + 3 + 4 + 5 = 15.

numero = abs(int(input("Introduce un numero entero positivo: ")))
suma = 0
for i in range(0,numero+1,1):
    suma = suma + i

print(f"el resultado es {suma}")
