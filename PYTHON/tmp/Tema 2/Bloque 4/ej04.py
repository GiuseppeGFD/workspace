"""4. Información y resultado de la excepción
Solicita al usuario un número entero y realiza
una operación que pueda producir un ValueError.

Captura la excepción utilizando except ValueError
as e y muestra por pantalla la información almacenada en e.
Si la conversión se realiza correctamente, muestra el número
introducido utilizando else."""

try:
    numero = int(input("Introduce un valor: "))

except ValueError as e:
    print(f"Error: {e}")