# Contar cuántas veces aparece una cifra. Recibe un entero no negativo y una cifra entre 0 y 9, 
# y devuelve cuántas veces aparece esa cifra en el número. Por ejemplo, si recibe 50525 y la cifra 5, 
# devuelve 3. Considera que el número 0 contiene una cifra.

#=========================== FUNCION IMPRIMIR ===============================
def contarCifra(cifra, numero):
    if numero == 0 and cifra == 0:
        return 1
        
    contador = 0
    while numero > 0:
        ultimo_digito = numero % 10
        if ultimo_digito == cifra:
            contador += 1
        numero = numero // 10
        
    return contador


#========================================================================

#=========================== FUNCION MAIN ===============================

def main():
    try:
        print(contarCifra(12342,1))
    except Exception as e:
        print(e)

if __name__ == '__main__':
    main()

#========================================================================