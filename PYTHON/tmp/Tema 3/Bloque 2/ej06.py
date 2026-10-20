# Ejercicio 6. Precio de una estancia

def calcular_precio_estancia(noches, tarifa_noche, desayuno=0.0, aparcamiento=0.0): # Calcula el precio total de la estancia
    coste_alojamiento = noches * tarifa_noche
    coste_desayuno = noches * desayuno
    coste_aparcamiento = noches * aparcamiento
    return coste_alojamiento + coste_desayuno + coste_aparcamiento

def mostrar_resumen_estancia(noches, importe_alojamiento, importe_desayuno=0.0, importe_aparcamiento=0.0, total=None): # Muestra el desglose
    if total is None:
        total = importe_alojamiento + importe_desayuno + importe_aparcamiento # lo calcula

    print("--- RESUMEN DE LA ESTANCIA ---")
    print(f"Noches: {noches}")
    print(f"Alojamiento: {importe_alojamiento:.2f} €")
    print(f"Desayuno: {importe_desayuno:.2f} €")
    print(f"Aparcamiento: {importe_aparcamiento:.2f} €")
    print(f"Total: {total:.2f} €")
    print()

def main():
    # Caso 1: 3 noches a 80 € sin servicios adicionales
    noches1 = 3 # 3 noches
    tarifa1 = 80.0 # 80 euracos
    alojamiento1 = noches1 * tarifa1 # noches por precio
    total1 = calcular_precio_estancia(noches1, tarifa1) # calcula la estancia
    mostrar_resumen_estancia(noches1, alojamiento1, total=total1) # muestra el resumen pa eso 

    # Caso 2: 2 noches a 95 € con desayuno (12 € por noche) usando argumento nominal
    noches2 = 2
    tarifa2 = 95.0
    desayuno_noche = 12.0
    alojamiento2 = noches2 * tarifa2
    importe_desayuno = noches2 * desayuno_noche
    total2 = calcular_precio_estancia(noches2, tarifa2, desayuno=desayuno_noche)
    mostrar_resumen_estancia(noches2, alojamiento2, importe_desayuno=importe_desayuno, total=total2)

if __name__ == '__main__':
    main()
