# 10. Suma de números pares
"""Pide al usuario un número entero
positivo n y calcula la suma de todos
los números pares comprendidos entre 1 y n,
ambos incluidos, utilizando un bucle while.
Por ejemplo, si el usuario introduce 10,
el programa deberá calcular:
2 + 4 + 6 + 8 + 10 = 30
Finalmente, muestra por pantalla el resultado de la suma."""

print("\n=======================================================")
n = abs(int(input("Introduce un numero entero posotivo: ")))
print("=======================================================")

i = 2
muestra = ""
suma = 0
while (i <= n):
    if i%2 == 0:
        if i == 2:
            muestra = f"{i}"
        else:
            muestra = f"{muestra} + {i}"
        suma = suma + i
        i += 1
    else:
        i += 1
print("\n=======================================================")
print(f"{muestra} = {suma}")
print("=======================================================\n")
