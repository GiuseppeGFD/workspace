# 1. Sistema de validación de datos
"""Diseña un programa que solicite al usuario una serie
de datos personales y compruebe que todos ellos se encuentran 
dentro de los valores permitidos.

El programa deberá solicitar:
Edad: entre 18 y 100 años.
Altura: entre 100 y 230 centímetros.
Número de hijos: entre 0 y 20.
"""

while True:
    try:
        edad = int(input("Introduce tu edad: "))
        if (edad > 17 and edad < 101):
            print("Edad guardada con exito")
            break
        else:
            print("Error, introduce una edad válida")
    except ValueError as e:
        print("Error, dato inválido")
while True:
    try:
        altura = int(input("Introduce tu edad: "))
        if (edad > 17 and edad < 101):
            print("Edad guardada con exito")
            break
        else:
            print("Error, introduce una edad válida")
    except ValueError as e:
        print("Error, dato inválido")
while True:
    try:
        edad = int(input("Introduce tu edad: "))
        if (edad > 17 and edad < 101):
            print("Edad guardada con exito")
            break
        else:
            print("Error, introduce una edad válida")
    except ValueError as e:
        print("Error, dato inválido")
print(f"tu edad es: {edad} ")