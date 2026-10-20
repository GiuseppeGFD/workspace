# 1. Sistema de validación de datos
"""
Programa que pide datos personales (edad, altura y número de hijos)
y comprueba que los valores estén dentro de los límites y con el tipo correcto.
"""

print("=== VALIDACIÓN DE DATOS PERSONALES ===\n")

# Pedimos y comprobamos la edad (entre 18 y 100)
while True:
    try:
        edad = int(input("Introduce tu edad (18 - 100 años): "))
        if edad < 18 or edad > 100:
            print("Error: La edad debe estar entre 18 y 100 años.\n")
        else:
            break
    except ValueError:
        print("Error: Tienes que escribir un número entero.\n")

# Pedimos y comprobamos la altura (entre 100 y 230 cm)
while True:
    try:
        altura = float(input("Introduce tu altura en cm (100 - 230 cm): "))
        if altura < 100 or altura > 230:
            print("Error: La altura debe estar entre 100 y 230 cm.\n")
        else:
            break
    except ValueError:
        print("Error: Tienes que escribir un número válido.\n")

# Pedimos y comprobamos el número de hijos (entre 0 y 20)
while True:
    try:
        hijos = int(input("Introduce el número de hijos (0 - 20): "))
        if hijos < 0 or hijos > 20:
            print("Error: El número de hijos debe estar entre 0 y 20.\n")
        else:
            break
    except ValueError:
        print("Error: Tienes que escribir un número entero.\n")

# Mostramos el resumen con los datos válidos
print("\n--- RESUMEN DE DATOS ---")
print(f"Edad:            {edad} años")
print(f"Altura:          {altura} cm")
print(f"Número de hijos: {hijos}")

"""
Pruebas:
- Edad: probamos con 17 (fuera), 18 (límite válido), 100 (límite válido), 101 (fuera) y texto 'veinte'.
- Altura: probamos con 99 (fuera), 100 (límite válido), 230 (límite válido) y 231 (fuera).
- Hijos: probamos con -1 (fuera), 0 (límite válido), 20 (límite válido), 21 (fuera) y letras.
"""
