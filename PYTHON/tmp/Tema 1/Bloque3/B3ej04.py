distancia = float(input("Introduce la distancia en kilómetros: "))
consumo = float(input("Introduce el consumo en litros cada 100 km: "))
precio = float(input("Introduce el precio del litro de combustible: "))
personas = int(input("Introduce el número de personas: "))

litros_necesarios = (distancia / 100) * consumo
coste_total = litros_necesarios * precio
coste_por_persona = coste_total / personas

print("Litros necesarios:", round(litros_necesarios, 2))
print("Coste total:", round(coste_total, 2))
print("Coste por persona:", round(coste_por_persona, 2))