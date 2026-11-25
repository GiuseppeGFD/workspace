# Sumar los números impares desde 1 hasta n. Recibe un entero no negativo n y 
# devuelve la suma de todos los números impares comprendidos entre 1 y n, ambos incluidos. 
# Por ejemplo, si recibe 7, devuelve 16, porque 1 + 3 + 5 + 7 = 16.

#=========================== FUNCION IMPRIMIR ===============================
def sumarImpares(numero,valor=1,impresion="",suma=0):
    if (valor % 2 != 0 and valor <= numero):
        if (numero == valor):
            impresion = f"{impresion} {valor} ="
            suma += valor
            return sumarImpares(numero,valor+1,impresion,suma)
        else:
            impresion = f"{impresion} {valor} +" 
            suma += valor
            return sumarImpares(numero,valor+1,impresion,suma)
    elif (valor <= numero):
        return sumarImpares(numero,valor+1,impresion,suma)
    else:
        return print(f"{impresion} {suma}")

#========================================================================

#=========================== FUNCION MAIN ===============================

def main():
    try:
        sumarImpares(11) # no me funciona sol signo con los pares xd
    except Exception as e:
        print(e)

if __name__ == '__main__':
    main()

#========================================================================