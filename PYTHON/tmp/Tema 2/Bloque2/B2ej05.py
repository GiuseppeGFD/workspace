#  Día laborable
dia = int(input("Introduce un dia de la semana [1-7]: "))

match dia:
    case 1:
        print("El lunes es laborable")
    case 2:
        print("El Martes es laborable")
    case 3:
        print("El Miércoles es laborable")
    case 4:
        print("El Jueves es laborable")
    case 5:
        print("El Viernes es laborable")
    case 6:
        print("El Sabado NO es laborable")
    case 7:
        print("El Domingo NO es laborable")
    case _:
        print("El día introducido no es válido")