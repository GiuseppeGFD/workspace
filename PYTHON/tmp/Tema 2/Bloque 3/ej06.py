# Ejercicio 6: Números que no interesan
"""
Pide al usuario un número entero positivo n.
Recorre todos los números desde 1 hasta n y muestra únicamente
aquellos que no sean múltiplos de 3.
Utiliza continue para ignorar los múltiplos de 3.
"""

n = int(input("Introduce un número entero positivo (n): "))

if n <= 0:
    print("Debes introducir un número mayor que 0.")
else:
    print(f"Números del 1 al {n} que no son múltiplos de 3:")
    for numero in range(1, n + 1):
        if numero % 3 == 0:
            continue  # Ignora los múltiplos de 3
        print(numero)
