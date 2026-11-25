# Calcular el cociente de una división. Recibe dos números enteros no negativos, 
# dividendo y divisor, y devuelve el cociente entero sin utilizar los operadores 
# de división / ni división entera //. Resta el divisor al dividendo tantas veces 
# como sea posible. Por ejemplo, al dividir 17 entre 5, el cociente entero es 3. 
# El divisor deberá ser mayor que cero.


#=========================== FUNCION IMPRIMIR ===========================
def dividir(dividendo,divisor):
    resto = dividendo
    cociente = 0
    while (resto >= divisor):
        cociente+=1
        resto -= divisor
    return print(f"{dividendo}//{divisor} = {cociente}")

#========================================================================

#=========================== FUNCION MAIN ===============================

def main():
    try:
        dividir(10,11)
        #print(f"92/13 = Cociente: {92//13} resto: {92%13}")
    except Exception as e:
        print(e)

if __name__ == '__main__':
    main()

#========================================================================