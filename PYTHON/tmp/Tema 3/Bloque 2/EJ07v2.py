# Calcular el resto de una división. Recibe dos números enteros no negativos, 
# dividendo y divisor, y devuelve el resto sin utilizar los operadores /, // ni %. 
# Resta el divisor tantas veces como sea posible, hasta obtener un valor inferior al divisor. 
# Por ejemplo, al dividir 17 entre 5, el resto es 2. El divisor deberá ser mayor que cero.

#=========================== FUNCION IMPRIMIR ===========================
def dividir(dividendo,divisor):
    resto = dividendo
    cociente = 0
    while (resto >= divisor):
        cociente+=1
        resto -= divisor
    return print(f"{dividendo}%{divisor} = {resto}")

#========================================================================

#=========================== FUNCION MAIN ===============================

def main():
    try:
        dividir(10,3)
        #print(f"92/13 = Cociente: {92//13} resto: {92%13}")
    except Exception as e:
        print(e)

if __name__ == '__main__':
    main()

#========================================================================