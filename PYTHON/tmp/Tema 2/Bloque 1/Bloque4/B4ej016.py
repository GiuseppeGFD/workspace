# Menú de una aplicación con match
# Una aplicación dispone del siguiente menú:
# 1: Crear usuario.
# 2: Consultar usuario.
# 3: Modificar usuario.
# 4: Eliminar usuario.
# Solicita al usuario una opción y utiliza match
#  para mostrar la operación seleccionada. 
# Si introduce cualquier otro número, muestra “Opción no válida”.

print("======================")
print("1: Crear usuario.    =")
print("---------------------=")
print("2: Consultar usuario =")
print("---------------------=")
print("3: Modificar usuario.=")
print("---------------------=")
print("4: Eliminar usuario. =")
print("======================")
opcion = int(input("opcion [1-4]: "))

match opcion:
    case 1: print("Crear usuario")
    case 2: print("consultar usuario")
    case 3: print("modificar usuario")
    case 4: print("Eliminar Usuario")
    case _: print("Opcion no valida")