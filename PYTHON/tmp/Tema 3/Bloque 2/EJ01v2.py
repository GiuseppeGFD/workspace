# Imprimir de n a 1. Recibe un entero n e imprime los números desde n hasta 1.


#================================================================
def cuentaRegresiva(numero):
    for i in range(numero,0,-1):
        print(i)

#================================================================

#========================== MAIN ================================
def main():
    cuentaRegresiva(10)

if __name__ == '__main__':
    main()