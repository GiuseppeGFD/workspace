# Contar cuántas veces aparece una cifra. Recibe un entero no negativo y una cifra entre 0 y 9, 
# y devuelve cuántas veces aparece esa cifra en el número. Por ejemplo, si recibe 50525 y la cifra 5, 
# devuelve 3. Considera que el número 0 contiene una cifra.

#=========================== FUNCION IMPRIMIR ===============================
def contarCifra(cifra,numero,divisor=10,cont=0):
    if ((abs(cifra) % divisor) == abs(cifra)):
        print(f"el numero {abs(cifra)} contiene {cont} vece(s) el numero {numero}")
    else:
        if ( numero == ((abs(cifra) % divisor) // (divisor // 10)) ):
            cont+=1
        return contarCifra(cifra,numero,(divisor*10),cont)

#========================================================================

#=========================== FUNCION MAIN ===============================

def main():
    try:
        contarCifra(12342,2)
    except Exception as e:
        print(e)

if __name__ == '__main__':
    main()

#========================================================================