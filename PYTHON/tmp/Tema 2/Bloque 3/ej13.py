# Ejercicio 13: Corrige el programa
"""
El siguiente programa muestra los números del 1 al 5, pero no continúa
mostrando los números posteriores:

for numero in range(1, 11):
    if numero == 6:
        break
    print(numero)

Modifica el programa para que muestre los números del 1 al 10 excepto el 6.
Explica qué sentencia has cambiado y por qué el comportamiento del programa es diferente.
"""

print("--- Programa corregido: Números del 1 al 10 excepto el 6 ---")

# Código modificado: se cambia 'break' por 'continue'
for numero in range(1, 11):
    if numero == 6:
        continue  # Se sustituye break por continue
    print(numero)

print("\n" + "=" * 65)
