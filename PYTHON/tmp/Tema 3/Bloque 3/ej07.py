# Ejercicio 7. Factura con IVA


def calcularIVA(producto, iva=21):
    if iva is None:
        iva = 21

    total = producto + (producto * iva / 100)

    print("------Factura-----")
    print(f"producto: {producto}€")
    print(f"IVA:      {iva}%")
    print(f"Total:    {total:.2f}€")
    print("-------------------\n")


def main():
    calcularIVA(producto=120, iva=21)  
    calcularIVA(producto=80, iva=None)
    calcularIVA(producto=50, iva=10)


if __name__ == '__main__':
    main()