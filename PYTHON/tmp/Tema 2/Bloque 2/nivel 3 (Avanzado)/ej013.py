# 13. Invertir un número
"""Pide al usuario un número entero positivo
 y muestra el número con sus cifras en orden inverso.

Debes trabajar con el número utilizando operaciones
matemáticas sobre sus cifras. No debes convertir
el número a una cadena de caracteres para resolver el ejercicio.

Para obtener las diferentes cifras puedes utilizar los operadores % y //.

Por ejemplo, si el usuario introduce 4827, el programa deberá mostrar:
7284 """

n = int(input("Introduce un numero: "))
numero = n
invertido = 0

while numero > 0:
    cifra = numero % 10
    invertido = (invertido * 10) + cifra
    numero = numero // 10

print(f"{invertido}")