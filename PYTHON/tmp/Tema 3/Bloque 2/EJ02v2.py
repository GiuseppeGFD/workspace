# Imprimir de 1 a n. Recibe un entero n e imprime los números desde 1 hasta n.


#================================================================
def cuentaProgresiva(numero):
    for i in range(1,numero+1,1):
        print(i)

#================================================================

#========================== MAIN ================================
def main():
    cuentaProgresiva(10)

if __name__ == '__main__':
    main()