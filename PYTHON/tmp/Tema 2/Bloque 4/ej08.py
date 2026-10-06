# 8. Entrada de números hasta cero
"""Solicita números enteros al usuario continuamente.

Si introduce un número válido distinto de cero, muestra el número.
Si introduce un valor que no sea un número entero, muestra un 
mensaje de error y continúa solicitando datos.

Si introduce 0, finaliza el programa.
Utiliza while True, try, except ValueError, continue y break."""


while True:
    try:
        n = int(input("Introduce un numero: "))
        if (n != 0):
            print(f"Numero introducido === {n}")
            continue
        else:
            print("Numero introducidod igual a ¡¡¡CERO!!!")
            break
    except ValueError as e:
        print(f"Error numero invalido = {e}")
    