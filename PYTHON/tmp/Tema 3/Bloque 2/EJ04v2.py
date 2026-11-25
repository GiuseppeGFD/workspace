# Calcular una potencia. Recibe una base a y un exponente entero no negativo n, 
# y devuelve el resultado de calcular a elevado a n. No utilices el operador de potencia **.


#=========================== FUNCION IMPRIMIR ===============================
def calcularPotencia(numero,potencia):
    resultado = numero
    for i in range(1,potencia):
        resultado *= numero
    return print(f"El resultado de {numero}^{potencia} = {resultado}")

#========================================================================

#=========================== FUNCION MAIN ===============================

def main():
    try:
        calcularPotencia(2,2)
        # print(f"2 ^2 = {2**4}")
    except Exception as e:
        print(e)

if __name__ == '__main__':
    main()

#========================================================================