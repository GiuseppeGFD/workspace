# 2. Sistema de control de acceso
"""
Simulador de control de acceso con código numérico (7314).
Permite hasta 4 intentos fallidos antes de bloquearse, o salir con 0.
"""

CODIGO_CORRECTO = 7314
MAX_INTENTOS = 4
intentos_incorrectos = 0

print("=== CONTROL DE ACCESO ===")
print("Introduce el código de acceso (o escribe '0' para cancelar).\n")

while intentos_incorrectos < MAX_INTENTOS:
    try:
        entrada = input(f"Introduce el código ({MAX_INTENTOS - intentos_incorrectos} intentos restantes): ")
        codigo = int(entrada)

        # Si el usuario escribe 0, se cancela y no cuenta como intento fallido
        if codigo == 0:
            print("\nOperación cancelada por el usuario.")
            break

        # Comprobamos si el código coincide
        if codigo == CODIGO_CORRECTO:
            print("\nAcceso concedido. ¡Bienvenido!")
            break
        else:
            intentos_incorrectos += 1
            print("Acceso denegado: código incorrecto.")
            if intentos_incorrectos == MAX_INTENTOS:
                print("\nSistema bloqueado: has superado los 4 intentos.")
            else:
                print(f"Te quedan {MAX_INTENTOS - intentos_incorrectos} intentos.\n")

    except ValueError:
        print("Error: Tienes que escribir un número.\n")

print("\n--- RESUMEN ---")
print("Intentos incorrectos realizados:", intentos_incorrectos)

"""
Pruebas:
- Meter 7314 al primer intento: da acceso directo y 0 fallos.
- Fallar dos veces y luego meter 7314: da acceso y muestra 2 fallos.
- Fallar 4 veces seguidas: bloquea el sistema.
- Meter letras ('hola'): muestra aviso y no suma intento fallido.
- Meter 0: cancela el proceso sin sumar intento fallido.
"""
