# Ejercicio 8: Procesamiento selectivo
"""
Pide al usuario 10 números enteros y procesa cada uno de ellos según su valor:

- Si el número es 0, ignóralo utilizando continue.
- Si el número es positivo, muestra el número.
- Si el número es negativo, muestra el mensaje 'Negativo:' seguido del número.
"""

print("Introduce 10 números enteros:")

for i in range(1, 11):
    numero = int(input(f"[{i}/10] Introduce un número: "))
    
    if numero == 0:
        continue  # Si es 0, se ignora
    
    if numero > 0:
        print(f"Positivo: {numero}")
    else:
        print(f"Negativo: {numero}")
