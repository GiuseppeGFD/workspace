# 5. Simulador de cajero automático
"""
Simulador de cajero automático con 1000 € de saldo inicial.
Permite consultar saldo, ingresar, retirar y consultar estadísticas.
"""

saldo = 1000.0

num_ingresos = 0
total_ingresado = 0.0

num_retiradas = 0
total_retirado = 0.0
mayor_retirada = None

while True:
    print("\n====== CAJERO ======")
    print("1. Consultar saldo")
    print("2. Ingresar dinero")
    print("3. Retirar dinero")
    print("4. Mostrar estadísticas")
    print("0. Salir")
    print("====================")

    opcion = input("Elige una opción: ").strip()

    match opcion:
        case "1":
            print(f"\nSaldo disponible: {saldo:.2f} €")

        case "2":
            try:
                cantidad = float(input("Cantidad a ingresar (€): "))
                if cantidad <= 0:
                    print("Error: La cantidad debe ser mayor que 0 €.")
                else:
                    saldo += cantidad
                    num_ingresos += 1
                    total_ingresado += cantidad
                    print(f"Ingreso realizado. Saldo actual: {saldo:.2f} €")
            except ValueError:
                print("Error: Tienes que escribir un número válido.")

        case "3":
            try:
                cantidad = float(input("Cantidad a retirar (€): "))
                if cantidad <= 0:
                    print("Error: La cantidad debe ser mayor que 0 €.")
                elif cantidad > saldo:
                    print(f"Saldo insuficiente. Saldo disponible: {saldo:.2f} €")
                else:
                    saldo -= cantidad
                    num_retiradas += 1
                    total_retirado += cantidad
                    # Guardamos la mayor retirada realizada
                    if mayor_retirada is None or cantidad > mayor_retirada:
                        mayor_retirada = cantidad
                    print(f"Retirada realizada. Saldo actual: {saldo:.2f} €")
            except ValueError:
                print("Error: Tienes que escribir un número válido.")

        case "4":
            print("\n--- ESTADÍSTICAS DEL CAJERO ---")
            print(f"Ingresos realizados:       {num_ingresos}")
            print(f"Total ingresado:           {total_ingresado:.2f} €")
            print(f"Retiradas realizadas:      {num_retiradas}")
            print(f"Total retirado:            {total_retirado:.2f} €")
            print(f"Saldo actual:              {saldo:.2f} €")
            if mayor_retirada is None:
                print("Mayor retirada:            No se han realizado retiradas")
            else:
                print(f"Mayor retirada:            {mayor_retirada:.2f} €")

        case "0":
            print("\nGracias por usar el cajero. ¡Hasta pronto!")
            break

        case _:
            print("Opción no válida. Elige entre 0 y 4.")

"""
Pruebas:
- Consultar saldo al inicio: muestra los 1000.00 € iniciales.
- Intentar retirar más de 1000 €: avisa de saldo insuficiente y no resta dinero.
- Meter importes negativos o texto: avisa de error sin romper el menú.
- Ver estadísticas al inicio: indica que no se han hecho retiradas todavía.
- Realizar varios ingresos y retiradas: actualiza el saldo y guarda la mayor retirada.
"""
