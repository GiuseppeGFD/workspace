# Precio de envío
# Si el paquete pesa 10 kg o menos, el precio del envío es de 5 €.
# Si pesa más de 10 kg y la distancia es de 100 km o menos, el precio es de 10 €.
# Si pesa más de 10 kg y la distancia supera los 100 km, el precio es de 20 €.

# Pide el peso del paquete. Si supera los 10 kg, solicita también la distancia y determina el precio correspondiente.
# Debes utilizar condicionales anidados.

print("=======================")
print("-----ingresar peso-----")
print("=======================")
peso = float(input("Peso [Kg]: "))
print("=======================")
print("---ingresar distancia--")
print("=======================")
distancia = float(input("distancia [Km]: "))

if peso <= 10:
    precio = 5
elif peso > 10 and distancia <= 100:
    precio = 10
elif peso > 10 and distancia > 100:
    precio = 20

print("=======================")
print(f"El precio es de {precio}€")
print("=======================")