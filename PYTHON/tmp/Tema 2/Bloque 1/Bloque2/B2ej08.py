# Clasificación de temperatura

temperatura = int(input("Ingresa la temperatura [Numero entero]: "))

if temperatura < 0:
    print("Muy Fría")
elif temperatura >= 0 and temperatura <= 14:
    print("fría")
elif temperatura >= 15 and temperatura <= 25:
    print("agradable")
elif temperatura >= 26 and temperatura <= 35:
    print("calurosa")
elif temperatura > 35:
    print("muy calurosa")
else:
    print("Error en la temperatura: valor incorrecto")