# 5. Mensaje final con finally
"""
Crea un programa que solicite al usuario
la cantidad de productos que desea comprar.
Si introduce un número entero, muestra la
cantidad. Si introduce un valor no válido,
muestra un mensaje de error.

Independientemente de lo que ocurra, el
programa debe mostrar al final:
Fin del programa
Utiliza finally."""

try:

    numero = int(input("Introduce un numero entero: "))
    print("===============================")
    print(f"Cantidad de productos = {numero}")
    print("===============================")

except ValueError as e:
    print(f"\nError: {e}\n")
finally:
    print("Programa finalizado")