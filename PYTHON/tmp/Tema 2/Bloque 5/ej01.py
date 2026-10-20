# Museo: descubre un error mediante casos de prueba
"""
Un museo establece los siguientes precios para sus entradas:

Menores de 6 años: entrada gratuita.
De 6 a 17 años: 5 €.
De 18 a 64 años: 10 €.
Personas de 65 años o más: 6 €.
Se ha desarrollado el siguiente programa para calcular el precio de la entrada:
"""

edad = int(input("Introduce la edad: "))

if edad > -1 and edad < 6:
    precio = 0
elif edad < 18:
    precio = 5
elif edad < 65:
    precio = 10
elif edad < 0:
    precio = 10
else:
    precio = 6

print("Precio de la entrada:", precio, "€")

# El programa se ejecuta sin mostrar ningún error de sintaxis ni de ejecución, 
# pero contiene un problema en su funcionamiento.

"""Tareas:
Diseña al menos 8 casos de prueba.
Incluye valores normales y valores situados en los límites de los diferentes intervalos.
Anota para cada prueba el resultado esperado y el resultado obtenido.
Identifica la prueba que permite detectar el problema.
Explica qué está ocurriendo y clasifica el tipo de error.
Corrige el programa.
Vuelve a ejecutar las pruebas necesarias para comprobar que la corrección funciona.
"""
# PRIMERAS PRUEBAS
# caso 1: entrada = 5, salida = 0 (esperado 0€)
# caso 2: entrada = -2, salida = 0 (esperado "No valido")
# caso 3: entrada = 17, salida = 5 (esperado 5€)
# caso 4: entrada = 18, salida = 10 (esperado 10€)
# caso 5: entrada = 6, salida = 5 (esperado 5€)
# caso 6: entrada = 65, salida = 10 (esperado 6€)
# caso 7: entrada = 99, salida = 6 (esperado 6€)
# caso 8: entrada =  64, salida = 10 (esperado 10€)

# PRUEBAS FIXED
# caso 1: entrada = 5, salida = 0 (esperado 0€)
# caso 2: entrada = -2, salida = 5 (esperado "5")
# caso 3: entrada = 17, salida = 5 (esperado 5€)
# caso 4: entrada = 18, salida = 10 (esperado 10€)
# caso 5: entrada = 6, salida = 5 (esperado 5€)
# caso 6: entrada = 65, salida = 10 (esperado 6€)
# caso 7: entrada = 99, salida = 6 (esperado 6€)
# caso 8: entrada =  64, salida = 10 (esperado 10€)

# Respuestas:
# - Prueba que detecta el fallo: El caso con edad = 65. Con 65 debería costar 6 €, pero el código original cobraba 10 €.
# - Qué ocurre y tipo de error: Es un error lógico. En el código venía "elif edad <= 65:", por lo que el 65 entraba en el tramo de 10 € en vez de ir al else.
# - Corrección: Cambiar la condición a "elif edad < 65:" para que con 65 años vaya directo al else y cobre 6 €.



