# 7. Media de números
"""Pide números al usuario hasta que introduzca -1.
Al finalizar, calcula la media de los números introducidos,
sin tener en cuenta el -1.

Debes utilizar un contador para conocer cuántos
números válidos se han introducido y un acumulador
para calcular su suma.

Importante: si el usuario introduce -1 como primer valor
no se ha introducido ningún número y el programa deberá
indicarlo en lugar de calcular una media."""
contador = 0
suma = 0
while True:
    numero = int(input("Introduce un valor: "))

    if (numero == -1):
        break
    else:
        contador += 1
        suma = (suma + numero)

if (contador == 0):
    print("El usuario no ha introducido ningun valor")
else:
    print(f"La media de los numeros introducidos es {suma/contador}")
    print(f"contador: {contador}")
    print(f"sumatorio: {suma}")
