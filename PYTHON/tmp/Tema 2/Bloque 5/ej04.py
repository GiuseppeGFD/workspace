# 4. Cajero automático: comprueba las condiciones
"""
Un cajero automático permite realizar una retirada de dinero siguiendo estas reglas:

La cantidad a retirar debe ser mayor que 0 €.
La cantidad no puede superar el saldo disponible.
Si se cumplen ambas condiciones, se realiza la retirada.
En caso contrario, se muestra que la operación no es válida.
El saldo disponible es de 500 €.
"""

saldo = 500

try:
    cantidad = float(input("¿Cuánto dinero quieres retirar? "))

    # La cantidad debe ser estrictamente mayor que 0 (> 0) y no superar el saldo
    if cantidad > 0 and cantidad <= saldo:
        saldo = saldo - cantidad
        print("Retirada realizada")
        print("Nuevo saldo:", saldo, "€")
    else:
        print("Operación no válida")

except ValueError:
    print("Operación no válida: debes introducir un número.")

"""
Tareas:

1. Qué debe ocurrir:
   - Si la cantidad es <= 0: muestra 'Operación no válida' (debe ser mayor que 0 €).
   - Si la cantidad es > 500: muestra 'Operación no válida'.
   - Si está entre 0 y 500: realiza la retirada y muestra el nuevo saldo.

2. Pruebas realizadas:
   - Caso 1: entrada -50 -> Operación no válida (esperado: no válida)
   - Caso 2: entrada 0 -> Operación no válida (el código original permitía retirar 0 €, aquí está el fallo)
   - Caso 3: entrada 200 -> Retirada realizada, nuevo saldo: 300 €
   - Caso 4: entrada 500 -> Retirada realizada, nuevo saldo: 0 €
   - Caso 5: entrada 600 -> Operación no válida
   - Caso 6: entrada 125.50 -> Retirada realizada, nuevo saldo: 374.5 €
   - Caso 7: entrada 0.01 -> Retirada realizada, nuevo saldo: 499.99 €

3. Prueba que detecta el error:
   El caso de prueba con cantidad = 0. En el código original decía 'Retirada realizada',
   pero la primera regla dice que debe ser mayor que 0 €.

4. Explicación del error y tipo de error:
   Es un error lógico. El código original usaba 'cantidad >= 0', lo que daba por válido el 0.
   La condición correcta debe ser 'cantidad > 0'.

5. Corrección:
   Cambiar 'cantidad >= 0' por 'cantidad > 0 and cantidad <= saldo' y añadir try-except
   para que no falle si meten letras.
"""
