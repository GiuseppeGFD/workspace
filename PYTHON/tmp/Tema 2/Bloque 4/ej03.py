numero = int("hola") # ValueError
resultado = 10 / 0 # ZeroDivisor

resultado = "5" + 3 #type error

numero = int(input("Numero: ")) # puede fallar el casting
resultado = 100 / numero # 

try:
    numero = int(input("Numero: ")) 
    resultado = 100 / numero
except ValueError:
    print("valor erroneo")
except ZeroDivisionError:
    print("no puedes dividir por zero")