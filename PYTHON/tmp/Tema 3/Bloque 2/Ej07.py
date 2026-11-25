# Calcular el resto de una división. Recibe dos números enteros no negativos, 
# dividendo y divisor, y devuelve el resto sin utilizar los operadores /, // ni %. 
# Resta el divisor tantas veces como sea posible, hasta obtener un valor inferior al divisor. 
# Por ejemplo, al dividir 17 entre 5, el resto es 2. El divisor deberá ser mayor que cero.

#=========================== FUNCION IMPRIMIR ===============================
def dividir(dividendo,divisor,resto=None,cociente=0):
    if(resto == None):
        resto = dividendo
    if((resto - divisor) >= 0):
        resto = resto - divisor
        return dividir(dividendo,divisor,resto,cociente+1)
    else:
        print(f"{dividendo}/{divisor} = Resto: {resto}")
#========================================================================

#=========================== FUNCION MAIN ===============================

def main():
    try:
        dividir(92,13)
        #print(f"92/13 = Cociente: {92//13} resto: {92%13}")
    except Exception as e:
        print(e)

if __name__ == '__main__':
    main()

#========================================================================