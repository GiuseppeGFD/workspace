import math

cateto1 = float(input("Ingresa el primer cateto: "))
cateto2 = float(input("Ingresa el segundo cateto: "))

resultado = math.sqrt((cateto1**cateto1)+(cateto2**cateto2))

print("========================================")
print("          Variables introducidas")
print("========================================")
print(f"       Primer cateto: {cateto1}")
print(f"       Segundo cateto: {cateto2}")
print("========================================")
print(f"       hipotenusa: {resultado:.2f}")
print("========================================")