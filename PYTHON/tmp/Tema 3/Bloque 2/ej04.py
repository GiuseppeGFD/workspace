# Calcular una potencia. Recibe una base a y un exponente entero no negativo n, 
# y devuelve el resultado de calcular a elevado a n. No utilices el operador de potencia **.


#=========================== FUNCION IMPRIMIR ===============================
def calcularPotencia(numero,potencia,cont=0,resultado=0):
    if (cont < potencia):
        if (resultado == 0):
            resultado = numero
        else:
            resultado = resultado * numero
        return calcularPotencia(numero,potencia,cont+1,resultado)
    else:
        print(f"{numero}^{potencia} = {resultado}")
#========================================================================

#=========================== FUNCION MAIN ===============================

def main():
    try:
        calcularPotencia(2,16)
        # print(f"2 ^16 = {2**16}")
    except Exception as e:
        print(e)

if __name__ == '__main__':
    main()

#========================================================================