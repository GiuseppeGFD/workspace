# Cuenta de números positivos
"""Pide números enteros al usuario mientras
 introduzca valores positivos. Cuando introduzca
  un número que no sea positivo, el programa deberá finalizar.
Al terminar, muestra cuántos números positivos se han introducido.
Debes utilizar un contador."""

numero = 0
contador = 0

while (numero >= 0):
    numero = int(input("Introduce un numero positivo: "))
    if numero >= 0:
        contador = contador+1



print(f"El numero total de numeros positivos fueron: {contador}")