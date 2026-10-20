# 7. Gestión de una estación de carga
"""
Registro de energía en kWh en una estación de recarga de vehículos eléctricos.
Termina al introducir 0 o si se cometen 5 errores de entrada (bloqueo).
"""

MAX_ERRORES = 5

errores = 0
operaciones_validas = 0
total_energia = 0.0
max_energia = None
min_energia = None
operaciones_mas_40 = 0
supero_100 = False
bloqueado = False

print("=== ESTACIÓN DE CARGA ===")
print("Introduce la energía suministrada en kWh en cada recarga.")
print("Escribe '0' para terminar el programa.\n")

while True:
    try:
        entrada = input("Introduce energía (kWh): ")
        energia = float(entrada)

        # Si el usuario escribe 0, terminamos de introducir datos
        if energia == 0:
            print("\nFinalizando introducción de datos...")
            break

        # Los valores negativos cuentan como error
        if energia < 0:
            errores += 1
            print(f"Error: La energía no puede ser negativa ({errores}/{MAX_ERRORES} errores).\n")
            if errores >= MAX_ERRORES:
                bloqueado = True
                print("Sistema bloqueado: has alcanzado 5 errores.")
                break
            continue

        # Si el dato es válido (positivo), acumulamos y comprobamos máximos y mínimos
        operaciones_validas += 1
        total_energia += energia

        if max_energia is None or energia > max_energia:
            max_energia = energia

        if min_energia is None or energia < min_energia:
            min_energia = energia

        if energia > 40.0:
            operaciones_mas_40 += 1

        if energia > 100.0:
            supero_100 = True

        print(f"Recarga registrada: {energia:.2f} kWh.\n")

    except ValueError:
        # El texto no numérico también cuenta como error
        errores += 1
        print(f"Error: Debes introducir un número ({errores}/{MAX_ERRORES} errores).\n")
        if errores >= MAX_ERRORES:
            bloqueado = True
            print("Sistema bloqueado: has alcanzado 5 errores.")
            break

# Mostramos el resumen final
print("\n--- RESUMEN FINAL ---")
if bloqueado:
    print("[AVISO: El sistema se bloqueó por alcanzar 5 errores]")

print(f"Operaciones válidas:           {operaciones_validas}")
print(f"Entradas incorrectas:          {errores}")

if operaciones_validas == 0:
    print("No se ha registrado ninguna operación válida.")
else:
    media = total_energia / operaciones_validas
    print(f"Energía total suministrada:    {total_energia:.2f} kWh")
    print(f"Media por operación:           {media:.2f} kWh")
    print(f"Mayor cantidad suministrada:   {max_energia:.2f} kWh")
    print(f"Menor cantidad suministrada:   {min_energia:.2f} kWh")
    print(f"Operaciones de más de 40 kWh:  {operaciones_mas_40}")
    if supero_100:
        print("¿Alguna operación superó 100 kWh?: Sí")
    else:
        print("¿Alguna operación superó 100 kWh?: No")

"""
Pruebas:
- Introducir 0 al inicio: termina y avisa de que no hay operaciones válidas.
- Cometer 5 errores (negativos o letras): bloquea el sistema y sale.
- Varias operaciones normales: calcula correctamente el total, la media, el máximo y el mínimo.
"""
