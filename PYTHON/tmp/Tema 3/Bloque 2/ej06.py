# Calcular el cociente de una división. Recibe dos números enteros no negativos, 
# dividendo y divisor, y devuelve el cociente entero sin utilizar los operadores 
# de división / ni división entera //. Resta el divisor al dividendo tantas veces 
# como sea posible. Por ejemplo, al dividir 17 entre 5, el cociente entero es 3. 
# El divisor deberá ser mayor que cero.


#=========================== FUNCION IMPRIMIR ===============================
def dividir(dividendo,divisor,resto=None,cociente=0):
    if(resto == None):
        resto = dividendo
    if((resto - divisor) >= 0):
        resto = resto - divisor
        return dividir(dividendo,divisor,resto,cociente+1)
    else:
        print(f"{dividendo}/{divisor} = Cociente: {cociente}")
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