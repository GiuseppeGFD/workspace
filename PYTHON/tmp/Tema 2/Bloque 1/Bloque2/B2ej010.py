# Planta del edificio
# -1: Garaje.
# 0: Planta baja.
# 1: Primera planta.
# 2: Segunda planta.
# 3: Tercera planta.
# 4: Cuarta planta.
# 5: Quinta planta.

planta = int(input("Introduce la planta[-1 to 5]"))

match planta:
    case -1: respuesta = "Garaje"
    case 0: respuesta = "Planta Baja"
    case 1: respuesta = "Primera planta"
    case 2: respuesta = "Segunda planta"
    case 3: respuesta = "Tercera planta"
    case 4: respuesta = "Cuarta planta"
    case 5: respuesta = "Quinta planta"
    case _: respuesta = "¡Valor Incorrecto!"

print("==================")
print(respuesta)
print("==================")