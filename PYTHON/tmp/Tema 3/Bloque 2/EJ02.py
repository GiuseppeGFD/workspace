# Imprimir de 1 a n. Recibe un entero n e imprime los números desde 1 hasta n.

#=========================== FUNCION IMPRIMIR ===============================

def imprimirNumero(final, valor=1):
    if (valor < final):
        print(f"{valor}")
        return imprimirNumero(final, valor+1)
    else:
        print(f"{valor}")
    

#========================================================================

#=========================== FUNCION MAIN ===============================

def main():
    try:
        imprimirNumero(10)
    except Exception as e:
        print(e)

if __name__ == '__main__':
    main()

#========================================================================