import datetime

# 1. Solicitar la fecha y cantidad de entradas
dia = int(input("Introduce el día de la visita: "))
mes = int(input("Introduce el mes de la visita: "))
anio = int(input("Introduce el año de la visita: "))

infantiles = int(input("Número de entradas infantiles (Base 15€): "))
adultas = int(input("Número de entradas adultas (Base 30€): "))
senior = int(input("Número de entradas senior (Base 18€): "))
vip = int(input("Número de entradas VIP (Base 55€): "))

fecha = datetime.date(anio, mes, dia)
dia_semana = fecha.weekday() 

if dia_semana == 0: nombre_dia = "Lunes"
elif dia_semana == 1: nombre_dia = "Martes"
elif dia_semana == 2: nombre_dia = "Miércoles"
elif dia_semana == 3: nombre_dia = "Jueves"
elif dia_semana == 4: nombre_dia = "Viernes"
elif dia_semana == 5: nombre_dia = "Sábado"
else: nombre_dia = "Domingo"

# 3. Determinar temporada y precios base
precio_infantil = 15.0
precio_adulto = 30.0
precio_senior = 18.0
precio_vip = 55.0

# Temporada alta: junio(6), julio(7), agosto(8), septiembre(9)
if mes == 6 or mes == 7 or mes == 8 or mes == 9:
    temporada = "Alta (+20 %)"
    precio_infantil = precio_infantil * 1.20
    precio_adulto = precio_adulto * 1.20
    precio_senior = precio_senior * 1.20
    precio_vip = precio_vip * 1.20
else:
    temporada = "Baja"

# 4. Modificación por día de la semana
texto_dia = ""
if dia_semana == 2: # Miércoles
    texto_dia = "Descuento miércoles: -3,00 € / entrada\n"
    precio_infantil -= 3
    precio_adulto -= 3
    precio_senior -= 3
    precio_vip -= 3
elif dia_semana == 5 or dia_semana == 6: # Sábado o Domingo
    texto_dia = "Suplemento fin de semana: +5,00 € / entrada\n"
    precio_infantil += 5
    precio_adulto += 5
    precio_senior += 5
    precio_vip += 5

# 5. Calcular totales
total_inf = infantiles * precio_infantil
total_adu = adultas * precio_adulto
total_sen = senior * precio_senior
total_vip = vip * precio_vip
total_compra = total_inf + total_adu + total_sen + total_vip

# 6. Mostrar el ticket
print("\n========================================")
print("       PARQUE DE ATRACCIONES")
print("========================================")
print(f"Fecha: {dia:02d}/{mes:02d}/{anio}")
print(f"Día: {nombre_dia}")
print(f"Temporada: {temporada}\n")

if texto_dia != "":
    print(texto_dia)

print("----------------------------------------")
if infantiles > 0: print(f"Infantiles:  {infantiles} × {precio_infantil:.2f} € = {total_inf:.2f} €")
if adultas > 0: print(f"Adultas:     {adultas} × {precio_adulto:.2f} € = {total_adu:.2f} €")
if senior > 0: print(f"Senior:      {senior} × {precio_senior:.2f} € = {total_sen:.2f} €")
if vip > 0: print(f"VIP:         {vip} × {precio_vip:.2f} € = {total_vip:.2f} €")
print("----------------------------------------")
print(f"TOTAL: {total_compra:.2f} €")
print("========================================")