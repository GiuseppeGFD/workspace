# 3. Equipaje: depura un proceso de validación
"""
Un sistema de control de equipaje debe procesar exactamente 5
equipajes válidos. Para cada equipaje se introduce su peso en kilogramos.

Un peso negativo no es válido y debe solicitarse de nuevo.
Si se introduce un valor que no es numérico, debe mostrarse un mensaje y volver a pedirlo.
Los equipajes de hasta 23 kg están dentro del límite.
Los equipajes de más de 23 kg tienen exceso de peso.
Al finalizar deben mostrarse el número de equipajes dentro del límite, 
el número con exceso y el peso total de los 5 equipajes válidos.
"""

equipajes_validos = 0
equipajes_exceso = 0
peso_total = 0
contador = 0

# Pedimos hasta tener 5 equipajes válidos
while contador < 5:
    try:
        peso = float(input(f"Introduce el peso del equipaje {contador + 1}/5: "))

        # Si el peso es negativo, avisamos y no sumamos al contador
        if peso < 0:
            print("Peso incorrecto (no puede ser negativo).")
            continue

        # Solo si es válido sumamos al contador
        contador += 1

        if peso <= 23:
            equipajes_validos += 1
        else:
            equipajes_exceso += 1

        peso_total += peso

    except ValueError:
        print("Debes introducir un número.")

print("\n--- RESUMEN FINAL ---")
print("Equipajes dentro del límite:", equipajes_validos)
print("Equipajes con exceso:", equipajes_exceso)
print("Peso total:", peso_total)

"""
Tareas:

1. Qué pasa con un peso negativo:
   Muestra 'Peso incorrecto' y lo vuelve a pedir sin sumar al contador ni acumular peso.

2. Pruebas realizadas:
   - Peso 15 -> dentro del límite
   - Peso -5 -> da error y vuelve a pedir
   - Texto 'abc' -> da error (ValueError) y vuelve a pedir
   - Peso 23 -> límite exacto, entra dentro del límite
   - Peso 25.5 -> exceso
   - Peso 10 -> dentro del límite
   - Peso 30 -> exceso

3. Error encontrado y tipo de error:
   Es un error lógico. En el código que venía en el enunciado, la línea 'contador += 1'
   estaba antes del 'if peso < 0: continue'. Al meter un peso negativo saltaba con continue
   pero el contador ya había sumado 1, por lo que el programa terminaba habiendo pedido solo
   4 equipajes válidos en vez de 5.

4. Corrección:
   Mover 'contador += 1' justo después de comprobar que el peso no es negativo,
   así solo avanza cuando el equipaje es válido.
"""