# Casos de prueba para las categorías de temperatura
# Un programa clasifica una temperatura según estas categorías:

""" 
Menor de 0: muy fría.
De 0 a 14: fría.
De 15 a 25: agradable.
De 26 a 35: calurosa.
Mayor de 35: muy calurosa.

Diseña una serie de casos de prueba que permita comprobar que todas las categorías funcionan correctamente.

Debes prestar especial atención a los valores situados en los límites de cada intervalo.

Para cada caso indica:

La entrada utilizada.
El resultado esperado.
El resultado obtenido al ejecutar el programa.
Si la prueba es correcta o no. """

# logica que usaremos, para la prueba lo haré con un bucle  "FOR" que compruebe cada valor
"""
if agua < 0:
    print(f"el agua tiene {agua}, es MUY fria")
elif agua < 15:
    print(f"el agua tiene {agua}, es fria")
elif agua < 26:
    print(f"el agua tiene {agua}, es agradable")
elif agua < 36:
    print(f"el agua tiene {agua}, es fria")
else:
    print(f"el agua tiene {agua}, es fria")
"""

for agua in range(-2, 40):
    if agua < 0:
        print(f"el agua tiene {agua}, es MUY fria")
    elif agua < 15:
        print(f"el agua tiene {agua}, es fria")
    elif agua < 26:
        print(f"el agua tiene {agua}, es agradable")
    elif agua < 36:
        print(f"el agua tiene {agua}, es calurosa")
    else:
        print(f"el agua tiene {agua}, es MUY calurosa")

# Funciona bien :)))) WIIIIII