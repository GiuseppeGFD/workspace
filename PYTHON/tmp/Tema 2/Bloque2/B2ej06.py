# Mismo signo
numero1 = int(input("Introduce el primer número: "))
numero2 = int(input("Introduce el segundo número: "))

if numero1 == 0 or numero2 == 0:
    print("Al menos uno de los números es cero.")
elif (numero1 > 0 and numero2 > 0) or (numero1 < 0 and numero2 < 0):
    print("Tienen el mismo signo.")
else:
    print("Tienen distinto signo.")