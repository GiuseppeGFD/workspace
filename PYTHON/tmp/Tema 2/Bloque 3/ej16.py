# Ejercicio 16: Procesar hasta una condición
"""
Crea un programa que solicite números enteros de forma repetida
y los procese según las siguientes condiciones:

- Si el número es negativo, ignóralo y continúa con la siguiente iteración.
- Si el número es positivo, muéstralo por pantalla.
- Si el número es superior a 100, muestra un mensaje indicando que se ha superado
  el límite y termina el programa.

Utiliza while True, continue y break.
Añade comentarios en el código explicando dónde utilizas cada sentencia y por qué es necesaria.
"""

print("Introduce números enteros (el programa terminará si introduces un valor superior a 100):")


while True:
    numero = int(input("Introduce un número entero: "))


    if numero < 0:
        continue


    if numero > 100:
        print(f"El número {numero} es superior a 100. Se ha superado el límite. Fin del programa.")
        break

    if numero > 0:
        print(f"Número positivo: {numero}")
    else:
        print("Has introducido el número 0.")
