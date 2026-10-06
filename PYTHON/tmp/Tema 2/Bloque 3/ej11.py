# Ejercicio 11: Dos bucles y continue
"""
Crea dos bucles anidados.
El bucle exterior debe recorrer los números del 1 al 3 y el interior los números del 1 al 5.
Cuando el bucle interior llegue al número 2, utiliza continue.

Muestra los valores que se procesan y explica qué ocurre con la iteración
en la que se ejecuta continue y qué ocurre con las siguientes.
"""

for exterior in range(1, 4):
    print(f"\n--- Bucle exterior: iteración {exterior} ---")
    for interior in range(1, 6):
        if interior == 2:
            print(f"  [Continue ejecutado en interior = {interior}: se salta esta iteración]")
            continue  # Salta el resto de la iteración actual del bucle interior
        print(f"  Exterior: {exterior}, Interior: {interior}")

print("\n" + "=" * 60)

