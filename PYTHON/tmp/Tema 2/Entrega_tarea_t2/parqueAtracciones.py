# importamos el datetime
import datetime

# pedir todos los datos al usuarioo
dia = int(input("Día de la visita: "))
mes = int(input("Mes de la visita: "))
ano = int(input("Año de la visita: "))

cant_infantil = int(input("Entradas infantiles: "))
cant_adulto = int(input("Entradas adultas: "))
cant_senior = int(input("Entradas senior: "))
cant_vip = int(input("Entradas VIP: "))

# usar datetime para saber el dia de la semana
fecha = datetime.date(ano, mes, dia)
dia_semana = fecha.weekday()

# saber el nombre del dia (use if en lugar de match pero es mejor match y me da pereza cambiarlo)
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

# solo los meses 6 7 8 y 9 son temporada alta, entonces se comprueba
if mes == 6 or mes == 7 or mes == 8 or mes == 9:
    temporada = "Alta (+20 %)"
    es_temporada_alta = True
else:
    temporada = "Baja"
    es_temporada_alta = False

# saber si hay descuento o suplemento despendiendo de si es fince o miercoles
modif_dia = 0
texto_modif = ""

if dia_semana == 2:
    modif_dia = -3
    texto_modif = "Descuento miércoles: -3.00 € / entrada"
elif dia_semana == 5 or dia_semana == 6:
    modif_dia = 5
    texto_modif = "Suplemento fin de semana: +5.00 € / entrada"

# precios bases
p_infantil = 15.0
p_adulto = 30.0
p_senior = 18.0
p_vip = 55.0

# aplicar el 20%, lo hago asi porque es mas visual porque capaz no se entiene el "precio*1.20"
if es_temporada_alta == True:
    p_infantil = p_infantil + (p_infantil * 0.20)
    p_adulto = p_adulto + (p_adulto * 0.20)
    p_senior = p_senior + (p_senior * 0.20)
    p_vip = p_vip + (p_vip * 0.20)

# se suma o resta la modificacion del dia (findes +5 y miercoles -3)
p_infantil = p_infantil + modif_dia
p_adulto = p_adulto + modif_dia
p_senior = p_senior + modif_dia
p_vip = p_vip + modif_dia

# calcular totales y usar el round para el precio
t_infantil = round(cant_infantil * p_infantil, 2)
t_adulto = round(cant_adulto * p_adulto, 2)
t_senior = round(cant_senior * p_senior, 2)
t_vip = round(cant_vip * p_vip, 2)

total_compra = t_infantil + t_adulto + t_senior + t_vip

# mostrar todo al usuario

print("========================================")
print("       PARQUE DE ATRACCIONES")
print("========================================")
print("Fecha:", dia, "/", mes, "/", ano)
print("Día:", nombre_dia)
print("Temporada:", temporada)

if texto_modif != "":
    print()
    print(texto_modif)

print("----------------------------------------")
if cant_infantil > 0:
    print("Infantiles: ", cant_infantil, "x", p_infantil, "€ =", t_infantil, "€")
if cant_adulto > 0:
    print("Adultas:    ", cant_adulto, "x", p_adulto, "€ =", t_adulto, "€")
if cant_senior > 0:
    print("Senior:     ", cant_senior, "x", p_senior, "€ =", t_senior, "€")
if cant_vip > 0:
    print("VIP:        ", cant_vip, "x", p_vip, "€ =", t_vip, "€")

print("----------------------------------------")
print("TOTAL:", total_compra, "€")
print("========================================")

# fin del ejercicio