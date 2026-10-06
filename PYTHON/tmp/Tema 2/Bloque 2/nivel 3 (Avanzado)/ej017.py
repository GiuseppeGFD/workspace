num = int(input("Introduce un numero: "))

esprimo = True

for i in range(2,num):
    if ( num%i == 0):
        esprimo = False

if (esprimo):
    print(f"{num} es primo")
else:
    print(f"{num} no es primo")