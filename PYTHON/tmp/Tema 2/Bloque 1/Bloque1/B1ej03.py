# Velocidad dentro del límite
velocidad = int(input("Introduce la velocidad del vehiculo en Km/h: "))

if velocidad <= 120:
    print(f"{velocidad}Km/h está en la velocidad aceptada")
else:
    print(f"{velocidad}Km/h NO está en la velocidad aceptada")