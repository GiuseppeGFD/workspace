# Tabla de multiplicar
"""Pide al usuario un número entero y
 muestra su tabla de multiplicar del 1 al 10.
Por ejemplo, para el número 7:"""
# 7 x 1 = 7
# 7 x 2 = 14
# ...
# 7 x 10 = 70

numero = int(input("Introduce un numero entero: "))

for i in range(1, 11, 1):
    print(f"{numero} x {i} = {numero*i}")