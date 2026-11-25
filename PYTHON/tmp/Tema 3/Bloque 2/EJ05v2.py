# Calcular el producto. Recibe dos números enteros no negativos, 
# a y b, y devuelve su producto sin utilizar el operador de multiplicación *. 
# Calcula el resultado mediante sumas sucesivas. Por ejemplo, para calcular 
# 4 × 3, suma el número 4 tres veces: 4 + 4 + 4 = 12.

#=========================== FUNCION IMPRIMIR ===============================
def calcularProducto(numero,multiplicador):
    resultado = numero
    for i in range(1,multiplicador):
        resultado += numero
    return print(f"{numero} * {multiplicador} = {resultado}")


#========================================================================

#=========================== FUNCION MAIN ===============================

def main():
    try:
        calcularProducto(2,16)
        # print(f"2 *16 = {2*16}")
    except Exception as e:
        print(e)

if __name__ == '__main__':
    main()

#========================================================================