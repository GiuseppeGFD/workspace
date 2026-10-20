# 6. Analiza y diseña antes de programar
"""
Registro de incidencias en servidores:
- Código 0: termina el programa.
- Negativos: no son válidos.
- 1 a 99: incidencias informativas.
- 100 a 499: advertencias.
- 500 o más: incidencias críticas.
- Entradas no enteras: volver a pedir.

----------------------------------------------------------------------
ANÁLISIS PREVIO:
----------------------------------------------------------------------
1. ¿Qué variables necesitas?
   - codigo: para guardar el número entero que escribe el usuario.
   - total_incidencias: para contar cuántas incidencias válidas llevamos.
   - informativas, advertencias, criticas: contadores para cada tipo.

2. ¿Qué información necesitas conservar durante la ejecución?
   Los totales acumulados de cada categoría y el total global. 
   No hace falta guardar cada código individual, solo los contadores.

3. ¿Qué decisiones debe tomar el programa?
   - Si mete 0: salir del bucle y terminar.
   - Si es menor que 0: mostrar error y no sumar nada.
   - Si está entre 1 y 99: sumar a informativas y al total.
   - Si está entre 100 y 499: sumar a advertencias y al total.
   - Si es 500 o más: sumar a críticas y al total.

4. ¿Qué partes del programa deben repetirse?
   Todo el proceso de pedir el código, comprobar que sea correcto y clasificarlo.
   Se repite hasta que el usuario introduzca un 0.

5. ¿Cuál es la condición que indica que se ha terminado?
   Que el código introducido sea igual a 0.

6. ¿Qué entradas pueden provocar errores?
   - Escribir texto o decimales (da ValueError al convertir con int()).
   - Escribir números negativos (hay que avisar con un if y volver a pedir).

7. ¿Qué estructuras de control utilizarás y por qué?
   - Un bucle while True: porque no sabemos cuántas incidencias va a meter el usuario.
   - try - except ValueError: para controlar si escribe letras sin que se rompa el programa.
   - if - elif - else: para clasificar el código según el rango en el que caiga.
----------------------------------------------------------------------
"""

total_incidencias = 0
informativas = 0
advertencias = 0
criticas = 0

print("=== REGISTRO DE INCIDENCIAS EN SERVIDORES ===")
print("Introduce los códigos de las incidencias (introduce '0' para terminar):\n")

while True:
    try:
        entrada = input("Introduce código de incidencia (0 para terminar): ")
        codigo = int(entrada)

        # Si escribe 0, salimos del bucle
        if codigo == 0:
            break

        # Los números negativos no son válidos
        if codigo < 0:
            print("Error: Los códigos negativos no son válidos.\n")
            continue

        # Si es válido, sumamos al total y clasificamos
        total_incidencias += 1

        if codigo <= 99:
            informativas += 1
            print(f"Código {codigo}: Incidencia INFORMATIVA registrada.\n")
        elif codigo <= 499:
            advertencias += 1
            print(f"Código {codigo}: ADVERTENCIA registrada.\n")
        else:
            criticas += 1
            print(f"Código {codigo}: Incidencia CRÍTICA registrada.\n")

    except ValueError:
        print("Error: Debes introducir un número entero.\n")

# Mostramos el resumen final
print("\n--- RESUMEN DE INCIDENCIAS ---")
print(f"Total registradas:       {total_incidencias}")
print(f"Informativas (1 - 99):   {informativas}")
print(f"Advertencias (100 - 499): {advertencias}")
print(f"Críticas (>= 500):       {criticas}")

"""
Pruebas:
- Introducir 0 al inicio: termina directamente con 0 incidencias.
- Código negativo (-10): muestra error y pide de nuevo.
- Texto ('servidor'): captura el ValueError y pide de nuevo.
- Códigos válidos:
  * 50 -> Informativa
  * 150 -> Advertencia
  * 600 -> Crítica
"""
