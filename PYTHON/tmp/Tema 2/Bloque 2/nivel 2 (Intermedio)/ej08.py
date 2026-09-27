# Factorial
"""Pide al usuario un número entero positivo y calcula su factorial utilizando un bucle."""

print("\n=======================================================\n")
n = abs(int(input("Introduce un numero pa factorizal mi loco: ")))
print("\n=======================================================\n")
muestra = ""
suma = 1

for i in range(1, n + 1, 1):
    if i != n:
        muestra += f"{i} x "
    else:
        muestra += f"{i} = "

    suma = suma*i

print(f"El factorial de {n}!: {muestra}{suma} ")
print("\n=======================================================\n")
