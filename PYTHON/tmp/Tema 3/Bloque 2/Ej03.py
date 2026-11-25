# Contar los dígitos de un entero. Recibe un entero no negativo y 
# devuelve el número de dígitos que contiene. Considera que el número 0 tiene un dígito.


#=========================== FUNCION IMPRIMIR ===============================

def numeroDigitos(numero,divisor=10,cont=1):
    if ((abs(numero) % divisor) == abs(numero)):
        print(f"El numero {numero} tiene {cont} digitos")
    else:
        return numeroDigitos(numero,(divisor*10),(cont+1))
    
#========================================================================

#=========================== FUNCION MAIN ===============================

def main():
    try:
        numeroDigitos(900000)
    except Exception as e:
        print(e)

if __name__ == '__main__':
    main()

#========================================================================