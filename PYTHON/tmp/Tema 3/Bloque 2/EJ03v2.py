# Contar los dígitos de un entero. Recibe un entero no negativo y devuelve el
# número de dígitos que contiene. Considera que el número 0 tiene un dígito.

#=========================== FUNCION IMPRIMIR ===============================

def contarDigitos(numero):
    divisor = 10 
    contador = 1

    while (numero % divisor != numero):
        contador+=1
        divisor *= 10
    return contador
    
#========================================================================

#=========================== FUNCION MAIN ===============================

def main():
    try:
        print(contarDigitos(500))
    except Exception as e:
        print(e)

if __name__ == '__main__':
    main()

#========================================================================