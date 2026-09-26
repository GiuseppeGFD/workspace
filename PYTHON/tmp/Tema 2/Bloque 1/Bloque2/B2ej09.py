# Categoría de puntuación

puntuacion = int(input("Introduce la puntuación [0-100]: "))

if puntuacion < 50:
    resultado = "Bronce"
elif puntuacion >= 50 and puntuacion <= 74:
    resultado = "Plata "
elif puntuacion >= 75 and puntuacion <= 89:
    resultado = "Oro"
elif puntuacion >= 90 and puntuacion <= 100:
    resultado = "Patino"
else:
    resultado = "Error en el valor introducido, Valor invalido."

print("==============")
print(resultado)
print("==============")


    

