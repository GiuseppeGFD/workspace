# Tipo de transporte con match
# Solicita al usuario un número del 1 al 5 
# y utiliza match para mostrar el medio de transporte correspondiente:
# 1: Coche.
# 2: Moto.
# 3: Autobús.
# 4: Tren.
# 5: Bicicleta.
# Si introduce otro número, muestra “Opción no válida”.
print("======================")
print("=     1: coche       =")
print("=--------------------=")
print("=     2: Moto        =")
print("=--------------------=")
print("=     3: Autobus     =")
print("=--------------------=")
print("=     4: Tren        =")
print("=--------------------=")
print("=     5: Bicicleta   =")
print("======================")
valor = int(input("Introduce opcion [1-5]: "))

match valor:
    case 1: print("Coche")
    case 2: print("Moto")
    case 3: print("Autobús")
    case 4: print("Tren")
    case 5: print("Bicicleta")
    case _: print("Opcion no valida")

print("====FIN===")