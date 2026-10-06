# 6. Cinco números válidos
"""Solicita números enteros al usuario
hasta conseguir cinco entradas válidas.

Si el usuario introduce un valor que
no puede convertirse en un número entero,
muestra un mensaje de error y vuelve a
solicitar un número. Una entrada incorrecta
no debe contar como una de las cinco entradas válidas.

Cuando se hayan introducido cinco números válidos,
muestra cuántos valores se han introducido en total
y  la suma de los cinco números válidos.
No puedes utilizar lisas ni colecciones para realizar este ejercicio"""

contador = 1
resultado = ""
suma = 0

while contador < 6:
    try:
        n = int(input("Introduce un valor: "))
        
        # Operador ternario corregido
        resultado = str(n) if contador == 1 else resultado + " + " + str(n) 
        
        suma = suma + n
        contador += 1  
        
    except ValueError as e:
        print(f"Error: Valor no valido \n\n{e} \n")

print(f"Restultado: {resultado} = {suma}")

#Pruebas: valor esperado = 10
"""
Introduce un valor: 2
Introduce un valor: 2
Introduce un valor: 2
Introduce un valor: 2
Introduce un valor: 2
Restultado: 2 + 2 + 2 + 2 + 2 = 10"""