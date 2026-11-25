# Determinar si dos números son amigos. Dos números positivos son amigos cuando 
# la suma de los divisores propios de cada uno es igual al otro número. Los divisores 
# propios de un número son los divisores positivos que lo dividen exactamente, excluyendo el propio número.
"""Por ejemplo, 220 y 284 son números amigos:

Divisores propios de 220: 1, 2, 4, 5, 10, 11, 20, 22, 44, 55 y 110. Su suma es 1 + 2 + 4 + 5 + 10 + 11 + 20 + 22 + 44 + 55 + 110 = 284.
Divisores propios de 284: 1, 2, 4, 71 y 142. Su suma es 1 + 2 + 4 + 71 + 142 = 220.
Como la suma de los divisores propios de 220 es 284 y la suma de los divisores propios de 284 es 220, los dos números son amigos."""


#=========================== FUNCION IMPRIMIR ===============================
def amigos(numero1, numero2, suma=0, divisor=None):
    if divisor == None:
        divisor = numero1 - 1
        
    if divisor == 0:
        if suma == numero2:
            return print("Son amigos")
        else:
            return print(f"No son amigos suma: {suma}")
            
    if numero1 % divisor == 0:
        suma += divisor
        
    return amigos(numero1, numero2, suma, divisor - 1)




#========================================================================

#=========================== FUNCION MAIN ===============================

def main():
    try:
        amigos(220,284) 
    except Exception as e:
        print(e)

if __name__ == '__main__':
    main()

#========================================================================