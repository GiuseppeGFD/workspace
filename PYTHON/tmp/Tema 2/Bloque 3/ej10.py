# Ejercicio 10: Dos bucles y break
"""
Crea dos bucles anidados.
El bucle exterior debe recorrer los números del 1 al 3 y el interior los números del 1 al 5.
Cuando el bucle interior llegue al número 3, utiliza break.

Muestra los valores de ambos bucles y explica qué bucle termina cuando se ejecuta break.
"""

for exterior in range(1, 4):
    print(f"\n--- Bucle exterior: iteración {exterior} ---")
    for interior in range(1, 6):
        if interior == 3:
            print(f"  [Break alcanzado en interior = {interior}]")
            break  # Termina únicamente el bucle interior actual
        print(f"  Exterior: {exterior}, Interior: {interior}")

print("\n" + "=" * 55)
