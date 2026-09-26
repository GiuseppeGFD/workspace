# Números impares
"""Muestra todos los números impares entre 
1 y 50 utilizando un bucle for y range().
El programa deberá mostrar los valores en orden ascendente."""

for i in range(0,51,1):
    if(i%2 != 0):
        print(i)
