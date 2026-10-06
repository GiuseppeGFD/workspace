import random
# 9. Menú robusto
"""Crea un menú que se repita hasta que el usuario seleccione la opción 0.

1. Mostrar saludo
2. Mostrar un número
0. Salir

El programa debe controlar mediante ValueError que el usuario introduzca un número.

Si introduce una opción inexistente, debe mostrar:

Opción no válida.
Después debe volver a mostrar el menú. 
La opción 0 debe finalizar el programa.

Utiliza while True, try, except ValueError, selección y break."""

while True:

    try:
        print("\n")
        print("==============================")
        print("=   [1] Mostrar un saludo    =")
        print("=   [2] Mostrar un número    =")
        print("=   [0] Salir                =")
        print("==============================")
        print("\n")

        n = int(input("Introduce un valor: "))

        match n:
            case 1: print("\Buenos dias\n")
            case 2: print(f"Numero aleatorio: {random.randint(1,10)}")
            case 0: break
            case _: print("Opción no válida.")


    except ValueError as e:
        print(f"Valor Incorrecto, el valor debe ser un numero")