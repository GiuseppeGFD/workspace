# 4. Gestión de ventas
"""
Menú para registrar ventas y devoluciones de una tienda.
Muestra estadísticas acumuladas (total ventas, devoluciones, balance y ventas > 100 €).
"""

num_ventas = 0
total_ventas = 0.0
num_devoluciones = 0
total_devoluciones = 0.0
ventas_mayores_100 = 0

while True:
    print("\n====== GESTIÓN DE VENTAS ======")
    print("1. Registrar venta")
    print("2. Registrar devolución")
    print("3. Mostrar estadísticas")
    print("0. Salir")
    print("================================")
    
    opcion = input("Elige una opción: ").strip()

    match opcion:
        case "1":
            try:
                importe = float(input("Introduce el importe de la venta (€): "))
                if importe <= 0:
                    print("Error: El importe debe ser mayor que 0.")
                else:
                    num_ventas += 1
                    total_ventas += importe
                    if importe > 100.0:
                        ventas_mayores_100 += 1
                    print(f"Venta registrada: {importe:.2f} €")
            except ValueError:
                print("Error: Tienes que escribir un número.")

        case "2":
            try:
                importe = float(input("Introduce el importe de la devolución (€): "))
                if importe <= 0:
                    print("Error: El importe debe ser mayor que 0.")
                else:
                    num_devoluciones += 1
                    total_devoluciones += importe
                    print(f"Devolución registrada: {importe:.2f} €")
            except ValueError:
                print("Error: Tienes que escribir un número.")

        case "3":
            balance = total_ventas - total_devoluciones
            print("\n--- ESTADÍSTICAS ---")
            print(f"Ventas realizadas:             {num_ventas}")
            print(f"Total ventas:                  {total_ventas:.2f} €")
            print(f"Devoluciones realizadas:       {num_devoluciones}")
            print(f"Total devoluciones:            {total_devoluciones:.2f} €")
            print(f"Balance (ventas - dev):        {balance:.2f} €")
            print(f"Ventas de más de 100 €:        {ventas_mayores_100}")

        case "0":
            print("\nSaliendo del programa...")
            break

        case _:
            print("Opción no válida. Elige una opción del menú (0, 1, 2 o 3).")

"""
Pruebas:
- Importe negativo o 0 en ventas/devoluciones: muestra error y no registra nada.
- Texto en importes: salta ValueError y el menú sigue funcionando.
- Opción que no existe (ej. 5): muestra aviso y vuelve al menú.
- Ver estadísticas al inicio: muestra todo a 0 sin errores.
- Varias ventas y devoluciones: calcula bien los totales, el balance y las ventas mayores a 100 €.
"""
