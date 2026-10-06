# Ejercicio 4: ¿Es un número primo?
"""
Pide al usuario un número entero positivo y determina si es primo.
Recuerda que un número primo solamente es divisible entre 1 y entre sí mismo.
Debes utilizar un bucle para comprobar si existe algún divisor diferente
de esos dos valores.

Pista: piensa detenidamente desde qué valor hasta qué valor necesitas
comprobar los posibles divisores. Si encuentras un divisor, ya puedes
dejar de comprobar los siguientes utilizando break.
"""

numero = int(input("Introduce un número entero positivo: "))

if numero <= 1:
    print(f"El número {numero} no es primo (los números primos deben ser mayores que 1).")
else:
    es_primo = True
    # Comprobamos posibles divisores desde 2 hasta numero - 1
    for divisor in range(2, numero):
        if numero % divisor == 0:
            es_primo = False
            print(f"Se ha encontrado un divisor: {divisor}. No es primo.")
            break  # Al encontrar un divisor no hace falta seguir comprobando

    if es_primo:
        print(f"El número {numero} es primo.")
    else:
        print(f"El número {numero} no es primo.")
