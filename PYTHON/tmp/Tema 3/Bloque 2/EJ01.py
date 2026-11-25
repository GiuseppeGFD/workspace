# Imprimir de n a 1. Recibe un entero n e imprime los números desde n hasta 1.

#=========================== FUNCION RECURSIVIDAD =======================

def imprimitNumero(n): 
    if (n < 1): 
        return print('fin') 
    else: 
        print(n) 
    return imprimitNumero(n-1) 

#========================================================================

#=========================== FUNCION MAIN ===============================

def main():
    print('\nrecursividad')
    try:
        imprimitNumero(5)
    except Exception as e:
        print(e)



if __name__ == '__main__':
    main()

#========================================================================