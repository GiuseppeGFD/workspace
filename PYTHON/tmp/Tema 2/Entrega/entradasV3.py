# Alumno: Giuseppe Farhat Curso: 2DAW (Se que el time y el os no lo hemos visto pero era para darle realismo)
import datetime # para las fechitas
import time # para ponerlo a dormir aveces
import os # para limpiar el cmd que luego se me llenaba de menus

# Meto todo en un try gigante para asegurarme de que el finally del final se ejecute siempre
try: # tambien por si no tuve algo en cuenta
    # Bucle para pedir la fecha hasta que el usuario meta una de verdad
    while True:
        try:
            dia = int(input("Día de la visita: "))
            mes = int(input("Mes de la visita: "))
            ano = int(input("Año de la visita: "))
            
            # Compruebo que la fecha existe de verdad (febrero no tiene 31 dias, etc)
            fecha = datetime.date(ano, mes, dia)
        except ValueError:
            print("\nLa fecha introducida no es válida. Inténtalo de nuevo.\n")
            time.sleep(2)
            os.system('cls' if os.name == 'nt' else 'clear')
        else:
            # Si la fecha está bien, rompo el bucle y sigo
            break 

    # pongo los contadores a cero antes de empezar
    cant_infantil = 0
    cant_adulto = 0
    cant_senior = 0
    cant_vip = 0

    # bucle del menu para que se repita hasta pulsar 0
    while True:
        print("\n========================================")
        print("       PARQUE DE ATRACCIONES")
        print("========================================")
        print("1. Añadir entrada infantil")
        print("2. Añadir entrada adulta")
        print("3. Añadir entrada senior")
        print("4. Añadir entrada VIP")
        print("0. Finalizar compra\n")
        
        try:
            opcion = int(input("Selecciona una opción: "))
        except ValueError:
            # si meten letras o símbolos
            print("\nLa opción debe ser un número.\n")
            time.sleep(2)
            os.system('cls' if os.name == 'nt' else 'clear')
            continue
        else:
            # uso else porque si no hay excepcion, compruebo que opcion ha elegido
            if opcion == 0:
                break
            
            elif opcion == 1:
                try:
                    cantidad = int(input("¿Cuántas entradas infantiles quieres añadir?: "))
                except ValueError:
                    print("\nLa cantidad debe ser un número.\n")
                    time.sleep(2)
                    os.system('cls' if os.name == 'nt' else 'clear')
                else:
                    if cantidad <= 0:
                        print("La cantidad debe ser positiva.")
                        time.sleep(2)
                        os.system('cls' if os.name == 'nt' else 'clear')
                    else:
                        cant_infantil += cantidad
                        print(f"\nSe han añadido {cantidad} entradas infantiles.")
            
            elif opcion == 2:
                try:
                    cantidad = int(input("¿Cuántas entradas adultas quieres añadir?: "))
                except ValueError:
                    print("\nLa cantidad debe ser un número.\n")
                    time.sleep(2)
                    os.system('cls' if os.name == 'nt' else 'clear')
                else:
                    if cantidad <= 0:
                        print("La cantidad debe ser positiva.")
                        time.sleep(2)
                        os.system('cls' if os.name == 'nt' else 'clear')
                    else:
                        cant_adulto += cantidad
                        print(f"\nSe han añadido {cantidad} entradas adultas.")
            
            elif opcion == 3:
                try:
                    cantidad = int(input("¿Cuántas entradas senior quieres añadir?: "))
                except ValueError:
                    print("\nLa cantidad debe ser un número.\n")
                    time.sleep(2)
                    os.system('cls' if os.name == 'nt' else 'clear')
                else:
                    if cantidad <= 0:
                        print("La cantidad debe ser positiva.")
                        time.sleep(2)
                        os.system('cls' if os.name == 'nt' else 'clear')
                    else:
                        cant_senior += cantidad
                        print(f"\nSe han añadido {cantidad} entradas senior.")
            
            elif opcion == 4:
                try:
                    cantidad = int(input("¿Cuántas entradas VIP quieres añadir?: "))
                except ValueError:
                    print("\nLa cantidad debe ser un número.\n")
                    time.sleep(2)
                    os.system('cls' if os.name == 'nt' else 'clear')
                else:
                    if cantidad <= 0:
                        print("La cantidad debe ser positiva.")
                        time.sleep(2)
                        os.system('cls' if os.name == 'nt' else 'clear')
                    else:
                        cant_vip += cantidad
                        print(f"\nSe han añadido {cantidad} entradas VIP.")
            
            else:
                # si mete un numero que no es del menu (como el 8)
                print("\nOpción no válida.")
                time.sleep(2)
                os.system('cls' if os.name == 'nt' else 'clear')
                continue

    # Saco el dia de la semana con la fecha que guardamos al principio
    dia_semana = fecha.weekday()
    
    if dia_semana == 0:
        nombre_dia = "Lunes"
    elif dia_semana == 1:
        nombre_dia = "Martes"
    elif dia_semana == 2:
        nombre_dia = "Miércoles"
    elif dia_semana == 3:
        nombre_dia = "Jueves"
    elif dia_semana == 4:
        nombre_dia = "Viernes"
    elif dia_semana == 5:
        nombre_dia = "Sábado"
    else:
        nombre_dia = "Domingo"

    # miro si es verano para la temporada alta
    if mes == 6 or mes == 7 or mes == 8 or mes == 9:
        temporada = "Alta (+20 %)"
        es_temporada_alta = True
    else:
        temporada = "Baja"
        es_temporada_alta = False

    modif_dia = 0.0
    texto_modif = ""

    # descuentos o suplementos segun el dia
    if dia_semana == 2:
        modif_dia = -3.0
        texto_modif = "Descuento miércoles: -3,00 € / entrada"
    elif dia_semana == 5 or dia_semana == 6:
        modif_dia = 5.0
        if dia_semana == 5:
            texto_modif = "Suplemento sábado: +5,00 € / entrada"
        else:
            texto_modif = "Suplemento domingo: +5,00 € / entrada"

    # precios base
    p_infantil = 15.0
    p_adulto = 30.0
    p_senior = 18.0
    p_vip = 55.0

    if es_temporada_alta:
        p_infantil = p_infantil + (p_infantil * 0.20)
        p_adulto = p_adulto + (p_adulto * 0.20)
        p_senior = p_senior + (p_senior * 0.20)
        p_vip = p_vip + (p_vip * 0.20)

    # sumo o resto lo del dia
    p_infantil += modif_dia
    p_adulto += modif_dia
    p_senior += modif_dia
    p_vip += modif_dia

    # redondeo a dos decimales
    t_infantil = round(cant_infantil * p_infantil, 2)
    t_adulto = round(cant_adulto * p_adulto, 2)
    t_senior = round(cant_senior * p_senior, 2)
    t_vip = round(cant_vip * p_vip, 2)

    total_compra = round(t_infantil + t_adulto + t_senior + t_vip, 2)

    # Imprimo el ticket
    print("\n========================================")
    print("       PARQUE DE ATRACCIONES")
    print("========================================")
    print(f"Fecha: {dia:02d}/{mes:02d}/{ano}")
    print(f"Día: {nombre_dia}")
    print(f"Temporada: {temporada}")

    if texto_modif != "":
        print(f"\n{texto_modif}")

    print("----------------------------------------")
    if cant_infantil > 0:
        print(f"Infantiles:  {cant_infantil} × {p_infantil:.2f} € = {t_infantil:.2f} €")
    if cant_adulto > 0:
        print(f"Adultas:     {cant_adulto} × {p_adulto:.2f} € = {t_adulto:.2f} €")
    if cant_senior > 0:
        print(f"Senior:      {cant_senior} × {p_senior:.2f} € = {t_senior:.2f} €")
    if cant_vip > 0:
        print(f"VIP:         {cant_vip} × {p_vip:.2f} € = {t_vip:.2f} €")

    print("----------------------------------------")
    print(f"TOTAL: {total_compra:.2f} €")
    print("========================================")

except Exception:
    # Esto está por si peta algo que no haya tenido en cuenta
    pass
finally:
    # El mensaje final que pide el enunciado sí o sí
    print("\nGracias por utilizar el sistema de venta.")