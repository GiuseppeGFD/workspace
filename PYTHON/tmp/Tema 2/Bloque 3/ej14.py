# Ejercicio 14: Menú con opción de salida
"""
Crea un programa que muestre repetidamente el siguiente menú:

1. Mostrar mensaje
2. Mostrar número
0. Salir

El programa debe cumplir las siguientes condiciones:
- La opción 1 debe mostrar un mensaje.
- La opción 2 debe mostrar un número.
- La opción 0 debe finalizar el programa.
- Cualquier otra opción debe mostrar un mensaje indicando que no es válida.
- El menú debe repetirse hasta que el usuario seleccione la opción 0.

Requisito: utiliza while True para mantener el menú en funcionamiento
y break para finalizar el bucle cuando el usuario seleccione la opción 0.
"""

while True:
    print("\n" + "=" * 25)
    print("         MENÚ")
    print("=" * 25)
    print("1. Mostrar mensaje")
    print("2. Mostrar número")
    print("0. Salir")
    print("=" * 25)
    
    opcion = input("Selecciona una opción: ").strip()

    if opcion == "1":
        print("\n-> [Mensaje]: ¡Bienvenido al curso de programación en Python!")
    elif opcion == "2":
        print("\n-> [Número]: El número seleccionado es el 42.")
    elif opcion == "0":
        print("\n-> Saliendo del programa. ¡Hasta pronto!")
        break  # Finaliza el bucle while True
    else:
        print(f"\n-> Opción '{opcion}' no válida. Por favor, selecciona 1, 2 o 0.")
