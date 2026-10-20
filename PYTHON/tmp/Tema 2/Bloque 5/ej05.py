# 5. Consumo eléctrico: prueba, depura y documenta
"""
Una empresa quiere analizar el consumo eléctrico registrado durante 7 mediciones válidas.

Un consumo negativo no es válido y debe solicitarse de nuevo.
Un consumo de hasta 20 kWh se considera bajo.
Un consumo mayor de 20 kWh y hasta 50 kWh se considera normal.
Un consumo mayor de 50 kWh se considera elevado.
Si se introduce un valor que no es numérico, debe mostrarse un mensaje de error y volver a solicitarse la medición.
Al finalizar las 7 mediciones válidas, deben mostrarse el número de consumos bajos, normales y elevados, 
el consumo total y el consumo medio.
"""

# Contadores y acumuladores
consumos_bajos = 0
consumos_normales = 0
consumos_elevados = 0
total = 0
contador = 0

# Repetimos hasta conseguir exactamente 7 lecturas válidas
while contador < 7:
    try:
        consumo = float(input(f"Introduce el consumo en kWh ({contador + 1}/7): "))

        # Los valores negativos no valen
        if consumo < 0:
            print("El consumo no puede ser negativo. Inténtalo de nuevo.")
            continue

        # Solo si el consumo no es negativo sumamos al contador
        contador += 1

        # Clasificamos según los tramos del enunciado
        if consumo <= 20:  # "hasta 20 kWh" incluye el 20
            consumos_bajos += 1
        elif consumo <= 50:  # de 21 a 50 kWh
            consumos_normales += 1
        else:  # más de 50 kWh
            consumos_elevados += 1

        total += consumo

    except ValueError:
        print("Debes introducir un número.")

media = total / contador

print("\n--- RESUMEN DE CONSUMO ---")
print("Consumos bajos (hasta 20 kWh):", consumos_bajos)
print("Consumos normales (21 - 50 kWh):", consumos_normales)
print("Consumos elevados (> 50 kWh):", consumos_elevados)
print(f"Consumo total: {total:.2f} kWh")
print(f"Consumo medio: {media:.2f} kWh")

"""
Tareas:

1. Qué debe hacer el programa:
   Pedir 7 consumos correctos. Si meten un negativo o letras, muestra error y no cuenta.
   Al final cuenta cuántos son bajos (hasta 20), normales (de 21 a 50) y elevados (más de 50),
   y calcula el consumo total y la media.

2. Pruebas realizadas:
   - Con -15 (negativo): avisa de error y el contador no avanza.
   - Con 'abc' (texto): salta el ValueError y el contador no avanza.
   - Con 0: cuenta como bajo.
   - Con 20: cuenta como bajo (en el original fallaba y contaba como normal).
   - Con 21: cuenta como normal.
   - Con 50: cuenta como normal.
   - Con 51: cuenta como elevado.

3. Errores encontrados en el código original:
   - Error 1: 'contador += 1' estaba colocado antes de 'if consumo < 0: continue'.
     Al meter un número negativo saltaba con continue pero el contador ya sumaba 1,
     por lo que no pedía las 7 mediciones válidas.
     Tipo: Error lógico.

   - Error 2: La condición de consumos bajos era 'if consumo < 20:', pero el enunciado dice
     'hasta 20 kWh', por lo que el 20 debe entrar en bajos (<= 20). En el original el 20
     entraba en normal.
     Tipo: Error lógico.

4. Solución:
   Mover 'contador += 1' después del if de negativos y cambiar la condición a 'if consumo <= 20:'.
"""
