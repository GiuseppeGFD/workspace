import datetime

# pido la fecha de la visita
dia = int(input("Día de la visita: "))
mes = int(input("Mes de la visita: "))
ano = int(input("Año de la visita: "))

# pongo los contadores a cero antes de empezar
cant_infantil = 0
cant_adulto = 0
cant_senior = 0
cant_vip = 0

# bucle infinito para que el menu se repita hasta pulsar 0
while True:
    print("\n========================================")
    print("       PARQUE DE ATRACCIONES")
    print("========================================")
    print("\n1. Añadir entrada infantil")
    print("2. Añadir entrada adulta")
    print("3. Añadir entrada senior")
    print("4. Añadir entrada VIP")
    print("0. Finalizar compra\n")
    
    opcion = input("Selecciona una opción: ").strip()

    # si pulsa 0, rompemos el bucle y vamos al ticket
    if opcion == "0":
        break

    elif opcion == "1":
        print()
        cantidad = int(input("¿Cuántas entradas infantiles quieres añadir?: "))
        # evitamos que metan ceros o negativos
        if cantidad <= 0:
            print("La cantidad debe ser positiva.")
            continue
        # sumo a lo que ya habia
        cant_infantil = cant_infantil + cantidad
        print(f"\nSe han añadido {cantidad} entradas infantiles.")

    elif opcion == "2":
        print()
        cantidad = int(input("¿Cuántas entradas adultas quieres añadir?: "))
        if cantidad <= 0:
            print("La cantidad debe ser positiva.")
            continue
        cant_adulto = cant_adulto + cantidad
        print(f"\nSe han añadido {cantidad} entradas adultas.")

    elif opcion == "3":
        print()
        cantidad = int(input("¿Cuántas entradas senior quieres añadir?: "))
        if cantidad <= 0:
            print("La cantidad debe ser positiva.")
            continue
        cant_senior = cant_senior + cantidad
        print(f"\nSe han añadido {cantidad} entradas senior.")

    elif opcion == "4":
        print()
        cantidad = int(input("¿Cuántas entradas VIP quieres añadir?: "))
        if cantidad <= 0:
            print("La cantidad debe ser positiva.")
            continue
        cant_vip = cant_vip + cantidad
        print(f"\nSe han añadido {cantidad} entradas VIP.")

    else:
        # por si mete un numero que no es del menu
        print("Opción no válida.")
        continue

# saco el dia de la semana con la fecha (0 es lunes, 6 es domingo)
fecha = datetime.date(ano, mes, dia)
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

# miro si es temporada alta (meses de verano)
if mes == 6 or mes == 7 or mes == 8 or mes == 9:
    temporada = "Alta (+20 %)"
    es_temporada_alta = True
else:
    temporada = "Baja"
    es_temporada_alta = False

# preparo los descuentos o recargos segun el dia
modif_dia = 0.0
texto_modif = ""

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

# subo el precio un 20% si es temporada alta
if es_temporada_alta:
    p_infantil = p_infantil + (p_infantil * 0.20)
    p_adulto = p_adulto + (p_adulto * 0.20)
    p_senior = p_senior + (p_senior * 0.20)
    p_vip = p_vip + (p_vip * 0.20)

# aplico lo del dia de la semana (+5 o -3)
p_infantil = p_infantil + modif_dia
p_adulto = p_adulto + modif_dia
p_senior = p_senior + modif_dia
p_vip = p_vip + modif_dia

# calculo el total redondeando a 2 decimales para que quede bien
t_infantil = round(cant_infantil * p_infantil, 2)
t_adulto = round(cant_adulto * p_adulto, 2)
t_senior = round(cant_senior * p_senior, 2)
t_vip = round(cant_vip * p_vip, 2)

total_compra = round(t_infantil + t_adulto + t_senior + t_vip, 2)

# imprimo el ticket final
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


# ==========================================
# PRUEBAS Y RESULTADOS PARA ENTREGAR
# ==========================================
# Prueba 1 (Opción no válida): 
# - Qué hice: Escribí '7' en el menú.
# - Resultado: El programa imprimió "Opción no válida." y me volvió a mostrar el menú sin crashear.
#
# Prueba 2 (Cantidad no válida): 
# - Qué hice: Seleccioné opción 1 y puse '-5' de cantidad. Luego probé con '0'.
# - Resultado: Ambas veces salió "La cantidad debe ser positiva." y volvió al menú sin sumar nada.
#
# Prueba 3 (Sumar la misma entrada varias veces): 
# - Qué hice: Añadí 2 entradas adultas. Luego otra vez la opción 2 y añadí 3 más.
# - Resultado: Al pulsar 0, en el ticket salían 5 entradas adultas en total. El contador funciona bien.
#
# Prueba 4 (Mezclar distintos tipos de entradas): 
# - Qué hice: Añadí 2 infantiles, 1 VIP y 1 senior.
# - Resultado: El ticket desglosó cada tipo de entrada por separado y calculó el total sumando todo correctamente.
#
# Prueba 5 (Finalizar compra con 0): 
# - Qué hice: Después de añadir un par de entradas, pulsé '0'.
# - Resultado: Rompió el bucle directamente con el break y me generó el resumen del ticket.