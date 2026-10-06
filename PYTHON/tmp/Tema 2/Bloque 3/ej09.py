# Ejercicio 9: pass no modifica el flujo
"""
Recorre los números del 1 al 15.
Cuando el número sea 7, utiliza la sentencia pass.
Después, muestra todos los números por pantalla.

Una vez ejecutado el programa, explica qué ocurre cuando se alcanza
el número 7 y por qué el resultado sigue mostrando ese número.

Importante: recuerda que pass no salta a la siguiente iteración y
tampoco termina el bucle. Simplemente indica que no se debe realizar
ninguna acción en ese punto y la ejecución continúa normalmente.
"""

print("Recorriendo los números del 1 al 15 con 'pass' en el 7:")

for numero in range(1, 16):
    if numero == 7:
        pass  # Operación nula: no hace nada y permite continuar la ejecución normal
    print(numero)

print("\n" + "=" * 50)
