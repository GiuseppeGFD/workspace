import random
# 11. Adivina el número
"""Establece en el programa un número secreto.
A continuación, pide al usuario que intente adivinarlo.
 
El programa deberá continuar solicitando números hasta
que el usuario acierte. Después de cada intento deberá
indicar si el número introducido es mayor o menor que el número secreto.

Al finalizar, muestra el número de intentos realizados."""

numero = int(random.randint(1,30))
valorUser = 0
intentos = 0

while valorUser != numero:
    intentos += 1
    valorUser = int(input("Ingresa un número"))
    if valorUser < numero:
        print("Estás por debajo")
    elif valorUser > numero:
        print("Estás por arriba")
    else:
        print("¡¡¡¡FELICIDADES!!!!")
        print(f"tuviste {intentos} intentos para encontrar el numero secreto")


    