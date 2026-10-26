# Ejercicio 9. Cálculo de una tarifa de servicio

def calcular_importe_base(horas, tarifa_hora): # Calcula el precio base según las horas
    return horas * tarifa_hora

def calcular_suplemento(importe_base, porcentaje_suplemento=0.0): # Calcula el importe del suplemento
    return importe_base * (porcentaje_suplemento / 100)

def calcular_total(importe_base, suplemento): # Calcula el coste total del servicio
    return importe_base + suplemento

def mostrar_tarifa_servicio(horas, tarifa_hora, importe_base, porcentaje_suplemento, suplemento, total): # Muestra el desglose del servicio
    print("--- TARIFA DEL SERVICIO ---")
    print(f"Horas: {horas}")
    print(f"Tarifa por hora: {tarifa_hora:.2f} €")
    print(f"Importe base: {importe_base:.2f} €")
    print(f"Suplemento ({porcentaje_suplemento:.1f} %): {suplemento:.2f} €")
    print(f"Total: {total:.2f} €")
    print()

def main():
    # Caso 1: tarifa estándar sin suplemento (usando el 0.0 % por defecto)
    horas1 = 3
    tarifa1 = 25.0
    base1 = calcular_importe_base(horas1, tarifa1)
    supl1 = calcular_suplemento(base1)
    total1 = calcular_total(base1, supl1)
    mostrar_tarifa_servicio(horas1, tarifa1, base1, 0.0, supl1, total1)

    # Caso 2: aplicando un suplemento del 15% mediante argumento nominal
    horas2 = 4
    tarifa2 = 30.0
    pct_suplemento2 = 15.0
    base2 = calcular_importe_base(horas2, tarifa2)
    supl2 = calcular_suplemento(base2, porcentaje_suplemento=pct_suplemento2)
    total2 = calcular_total(base2, supl2)
    mostrar_tarifa_servicio(horas2, tarifa2, base2, pct_suplemento2, supl2, total2)

if __name__ == '__main__':
    main()
