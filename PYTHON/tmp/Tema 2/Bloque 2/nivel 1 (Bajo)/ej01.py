# Cuenta atrás
"""Pide al usuario un número entero positivo 
y realiza una cuenta atrás hasta 0 utilizando un bucle while.
Por ejemplo, si el usuario introduce 5, el programa deberá mostrar:"""
# 0
# 1
# 2
# 3
# 4
# 5

numero = abs(int(input("Introduce un numero entero: ")))

if ( numero > 0):
    for i in range(numero, -1, -1):
        print(f"{i}")
else:
    print("Numero invalido")