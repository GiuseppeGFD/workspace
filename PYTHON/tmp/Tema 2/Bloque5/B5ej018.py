# El siguiente programa pretende indicar 
# si una temperatura es positiva, negativa
#  o igual a cero, pero contiene un error de sintaxis.

temperatura = int(input("Introduce la temperatura: "))

if temperatura > 0   # al if le falta el ":" 
    print("Temperatura positiva")
elif temperatura < 0:
    print("Temperatura negativa")
else:
    print("Temperatura igual a cero")

# Identifica el error, corrígelo y comprueba que el programa funciona correctamente.