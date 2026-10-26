# Ejercicio 8. Conversor de unidades

def kilometroAMilla(kilometros):
    CONSTANTE = 0.621371
    return float(kilometros) * CONSTANTE

def millaAKilometro(millas): 
    CONSTANTE = 1.60934
    return float(millas) * CONSTANTE

def mostrar(cantidad, unidad_origen, resultado, unidad_destino):
    print("------Conversión------") 
    print(f"{cantidad:.2f} {unidad_origen} = {resultado:.2f} {unidad_destino}")
    print("----------------------")
def main():
    km = 10.0
    millas = kilometroAMilla(km)
    mostrar(km, "km", millas, "millas")

    m = 5.0
    k = millaAKilometro(m)
    mostrar(m, "millas", k, "km")

if __name__ == '__main__':
    main()