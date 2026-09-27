# Potencias de 2
"""Muestra las 10 primeras potencias
de 2 utilizando un bucle for y range().
El resultado deberá comenzar con:"""
# 2^0 = 1
# 2^1 = 2
# 2^2 = 4
# ...

print("\n=======================================================\n")
n = int(input("Ingresa el numero (Entero): "))
print("\n=======================================================\n")
for i in range(0,11,1):
    print(f"{n}^{i} = {n**i}")
print("\n=======================================================\n")
