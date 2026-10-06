try:
    n1 = int(input("Introduce el dividendo"))

    n2 = int(input("Introduce el divisor"))

    resultado = n1 / n2

    print(f"{n1} / {n2} = {n1/n2}")
    
except ValueError:
    print("Debes introducir un valor entero")
except ZeroDivisionError:
    print("El cero no es un valor divisible")