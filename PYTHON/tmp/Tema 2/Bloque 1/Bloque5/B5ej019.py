# El siguiente programa pretende clasificar una puntuación según estas categorías:
# Menor de 50: Bronce.
# De 50 a 74: Plata.
# De 75 a 89: Oro.
# De 90 a 100: Platino.
# Sin embargo, el programa contiene un error lógico:

puntuacion = int(input("Introduce la puntuación: "))

if puntuacion >= 50: # cualquiera mejor que bronce será plata
    print("Plata")
elif puntuacion >= 75:
    print("Oro")
elif puntuacion >= 90:
    print("Platino")
else:
    print("Bronce") 

# Analiza el orden de las condiciones, identifica el problema
# y corrige el programa para que clasifique correctamente todas las puntuaciones.

puntuacion = int(input("Introduce la puntuación: "))

if puntuacion < 50: 
    print("Bronce") # version fixed
elif puntuacion < 75:
    print("Plata")
elif puntuacion < 90:
    print("Oro")
else:
    print("Platino")
