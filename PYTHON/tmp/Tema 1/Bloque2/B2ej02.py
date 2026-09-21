import math

print("calculadora de un cilindro")

radio = float(input("Ingresa el radio del cilindro: "))
altura = float(input("Ingresa la altura del cilindro: "))

areaBase = math.pi*radio**2
areaLateral = 2*math.pi*radio*altura
areaTotal = (2*math.pi*radio**2) + (2*math.pi*radio*altura)
volumen = ((math.pi)*(radio**2)*(altura))

print("=============================")
print(" ")
print("========== VALORES ==========")
print(f"    El radio es {radio}     ")
print(f"    La altura es {altura}    ")
print(" ")
print("========= Resultado =========")
print(" ")
print(f" area Base: {areaBase:.2f} ")
print(f" area Lateral: {areaLateral:.2f} ")
print(f" area Total: {areaTotal:.2f} ")
print(f" Volumen: {volumen:.2f} ")
print("=============================")
