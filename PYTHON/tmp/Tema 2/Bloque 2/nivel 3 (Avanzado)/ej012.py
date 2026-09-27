# 12. Número de dígitos
"""Pide al usuario un número entero positivo
y calcula cuántas cifras tiene utilizando un bucle while.

Ejemplo: si el usuario introduce 58321, el programa deberá
indicar que el número tiene 5 cifras.
"""
n = int(input("Ingresa una cifra poitiva: "))
divisor = 10
cifras = 1

while n % divisor != n:
    if n % divisor != n:
        cifras +=1
        divisor = divisor*10

print(f"el numero {n} tiene: {cifras} cifras")
