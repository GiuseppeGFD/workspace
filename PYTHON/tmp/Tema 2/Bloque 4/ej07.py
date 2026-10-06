# 7. División segura repetida
"""Solicita al usuario dos números enteros 
y realiza la división del primero entre el segundo.

Si alguno de los valores introducidos no 
es un número entero, muestra un mensaje 
de error y vuelve a solicitar los datos.

Si el segundo número es cero, informa 
de que no se puede realizar la división 
y vuelve a solicitar los datos.

El programa debe terminar cuando se 
consiga realizar correctamente una división 
y mostrar el resultado.

Utiliza while, try, except ValueError 
y except ZeroDivisionError."""

try:
    n1 = int(input("Introduce un valor: "))
    n2 = int(input("Introduce un valor: "))
    resultado = n1 / n2
    print(f"{n1} / {n2} = {n1/n2}")
except ValueError as e:
    print(f"Error con el valor introducido: {e}")
except ZeroDivisionError as e:
    print(f"Error: el divisor es cero = {e}")


