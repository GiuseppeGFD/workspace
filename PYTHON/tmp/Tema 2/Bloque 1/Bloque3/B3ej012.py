# Números ordenados
n1 = int(input("Introduce el primer valor: "))
n2 = int(input("Introduce el segundo valor: "))
n3 = int(input("Introduce el tercer valor: "))

if n1 == n2 and n2 == n3:
    print(f"Los valores {n1}, {n2} y {n3} son iguales")
elif n1 <= n2 and n2 <= n3:
    print(f"Los valores {n1}, {n2} y {n3} están en orden creciente")
elif n1 >= n2 and n2 >= n3:
    print(f"Los valores {n1}, {n2} y {n3} están en orden decreciente")
else:
    print(f"Los valores {n1}, {n2} y {n3} no están ordenados")
