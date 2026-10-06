# Ejercicio 3: Parar al encontrar un valor
"""
Pide al usuario números enteros de forma repetida.
Debes mostrar cada número introducido.
Cuando el usuario introduzca el valor 999, muestra un mensaje
indicando que se ha encontrado el valor de finalización y utiliza
break para terminar el bucle.
"""

while True:
    numero = int(input("Introduce un número entero (999 para terminar): "))
    print(f"Número introducido: {numero}")
    
    if numero == 999:
        print("Se ha encontrado el valor de finalización (999). Terminando bucle...")
        break
