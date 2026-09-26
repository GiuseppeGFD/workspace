# Números entre dos valores
"""Pide al usuario dos números enteros.
 El primer número será menor que el segundo.
  Muestra todos los números comprendidos entre ellos,
   incluidos los dos valores introducidos, utilizando for y range().

Por ejemplo, si introduce 4 y 9, deberá mostrar:"""
# 4
# 5
# 6
# 7
# 8
# 9

n1 = int(input("Introduce el primer valor: "))
n2 = int(input("Introduce el segundo valor: "))
if (n1 < n2):
    for i in range(n1,n2+1,+1):
        print(i)
else:
    print("el primer valor debe ser mayor que el segundo")