producto = input("Introduce el nombre del producto: ")
precio = float(input("Introduce el precio unitario: "))
unidades = int(input("Introduce el número de unidades: "))

total = precio * unidades

print("========================================")
print("            FICHA DE COMPRA")
print("========================================")
print(f"Producto:     {producto}")
print(f"Unidades:     {unidades}")
print(f"Precio/U:     {precio:.2f} €")
print("----------------------------------------")
print(f"TOTAL:        {total:.2f} €")
print("========================================")