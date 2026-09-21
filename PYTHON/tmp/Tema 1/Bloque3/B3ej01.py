salarioBase = int(input("Ingresa el salario base: "))
venta1 = int(input("Ingresa la venta 1: "))
venta2 = int(input("Ingresa la venta 2: "))
venta3 = int(input("Ingresa la venta 3: "))

totalvendido = venta1+venta2+venta3

print("==================Datos==================")
print(f"Total vendido:       {totalvendido}€    ")
print(f"salario Base:        {salarioBase}€     ")
print(f"Comision por ventas: {round(totalvendido*0.10)}€")
print(f"Salario final:       {(totalvendido*0.10 + salarioBase)}€")
print("====================================")


