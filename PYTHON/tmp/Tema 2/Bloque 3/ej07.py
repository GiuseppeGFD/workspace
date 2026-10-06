# Ejercicio 7: Ignorar números negativos
"""
Pide al usuario 8 números enteros.
Debes mostrar únicamente los números positivos.
Cuando se introduzca un número negativo, utiliza continue para
ignorarlo y pasar directamente a la siguiente iteración.
"""

print("Introduce 8 números enteros:")

for i in range(1, 9):
    numero = int(input(f"[{i}/8] Introduce un número entero: "))
    
    if numero < 0:
        continue  # Se ignora el número negativo y se pasa a la siguiente iteración
    
    if numero > 0:
        print(f"Número positivo: {numero}")
    else:
        # En caso de que se introduzca 0, no es positivo
        pass
