# Acceso a una atracción
# acceso a 12 años y midan al menos 140 centímetros.
# Solicita la edad y la altura del usuario e indica si puede acceder
# indica si el motivo es la edad, la altura o ambas condiciones.
# Debes utilizar condicionales anidado
print("===============================")
print("Bienvedido a la mejor atraccion")
print("===============================")
print("---------Indica tu edad--------")
edad = int(input("edad: "))
print("--------Indica tu altura-------")
altura = int(input("altura [cm]: "))
print("===============================")
if edad < 12 or altura < 140:
    print("NO PUEDES INGRESAR:")
    if (edad < 12) and altura > 139:
        print("¡¡¡no cumples la edad permitida!!!!")
    if (edad > 11) and altura < 140:
        print("No cumples la altura minima")
    else:
        print("No tienes ni la edad ni la altura permitida")
else:
    print("Puedes pasar, bienvenido.")
print("===============================")
