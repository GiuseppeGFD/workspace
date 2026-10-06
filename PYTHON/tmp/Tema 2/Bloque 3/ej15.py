# Ejercicio 15: Control de una entrada
"""
Crea un programa que pida números enteros de forma repetida.
El comportamiento debe ser el siguiente:

- Si el número es positivo, muestra el número.
- Si el número es negativo, ignóralo y continúa solicitando otro número.
- Si el número es 0, termina el programa.

Debes utilizar while True, continue y break.
"""

print("Programa de control de entrada (introduce 0 para finalizar):")

while True:
    numero = int(input("Introduce un número entero: "))

    # Si el número es 0, termina el programa utilizando break
    if numero == 0:
        print("Se ha introducido el 0. Finalizando el programa...")
        break

    # Si el número es negativo, se ignora utilizando continue
    if numero < 0:
        continue

    # Si el número es positivo, se muestra
    print(f"Número positivo introducido: {numero}")
