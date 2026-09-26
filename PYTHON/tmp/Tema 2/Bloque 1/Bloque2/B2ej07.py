# Momento del día

momento = int(input("Ingresa la hora [0-23]: "))

if momento >= 0 and momento <= 5:
    print("Madrugada")
elif momento >= 6 and momento <= 11:
    print("mañana")
elif momento >= 12 and momento <= 19:
    print("tarde")
elif momento >= 20 and momento <= 23:
    print("noche")
else:
    print("Error en la hora: valor incorrecto")