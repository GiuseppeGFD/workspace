# 14. Máximo de varios números
"""
Pide al usuario cuántos números quiere introducir.
El número de valores a introducir será al menos 1.
Después, solicita esos números uno a uno.

Al finalizar, muestra cuál ha sido el número mayor.

No puedes almacenar todos los números para realizar
la comparación posteriormente. Debes ir actualizando
el máximo durante las iteraciones."""



cantidad = int(input("¿Cuantos numeros quieres introducir?: "))


for i in range(1,cantidad+1,1):
    n = int(input("introduce un numero: "))
    