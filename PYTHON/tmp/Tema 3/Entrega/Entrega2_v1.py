#================================================================
# 1. FUNCIÓN ITERATIVA: MÉTODO NORMAL
#================================================================
def mcdIterativoNormal(a, b):
    menor = min(a, b)
    for divisor in range(menor, 0, -1):
        if a % divisor == 0 and b % divisor == 0:
            return divisor

#================================================================
# 2. FUNCIÓN RECURSIVA: MÉTODO NORMAL
#================================================================
def mcdRecursivoNormal(a, b, divisor=None):
    if divisor is None:
        divisor = min(a, b)
    
    if a % divisor == 0 and b % divisor == 0:
        return divisor
    
    return mcdRecursivoNormal(a, b, divisor - 1)

#================================================================
# 3. FUNCIÓN ITERATIVA: ALGORITMO DE EUCLIDES
#================================================================
def mcdIterativoEuclides(a, b):
    while b != 0:
        resto = a % b
        a = b
        b = resto
    return a

#================================================================
# 4. FUNCIÓN RECURSIVA: ALGORITMO DE EUCLIDES
#================================================================
def mcdRecursivoEuclides(a, b):
    if b == 0:
        return a
    return mcdRecursivoEuclides(b, a % b)

#================================================================
# ENTRADA Y VALIDACIÓN DE DATOS
#================================================================
def pedirNumeroPositivo(mensaje):
    while True:
        try:
            valor = int(input(mensaje))
            if valor <= 0:
                print("Error: El número debe ser un entero positivo mayor que 0.\n")
                continue
            return valor
        except ValueError:
            print("Error: Entrada no válida. Debes introducir un número entero.\n")

#================================================================
# MAIN
#================================================================
def main():
    while True:
        num1 = pedirNumeroPositivo("Introduce el primer número: ")
        num2 = pedirNumeroPositivo("Introduce el segundo número: ")
        
        if num1 == num2:
            print("Los dos números son iguales. Fin del programa.")
            break
        
        print()
        print(f"MCD mediante el método normal iterativo: {mcdIterativoNormal(num1, num2)}")
        print(f"MCD mediante el método normal recursivo: {mcdRecursivoNormal(num1, num2)}")
        print(f"MCD mediante Euclides iterativo: {mcdIterativoEuclides(num1, num2)}")
        print(f"MCD mediante Euclides recursivo: {mcdRecursivoEuclides(num1, num2)}")
        print()

if __name__ == '__main__':
    main()

# PRUEBAS
"""
Prueba 1: Numeros normales con MCD > 1
- Entrada: 24 y 36
- Lo que debería pasar: Debería dar 12 en las cuatro funciones.
- Lo que pasa: Da 12 en todas, perfecto.

Prueba 2: Un numero divisor del otro
- Entrada: 12 y 36
- Lo que debería pasar: Como 12 divide a 36, el MCD tiene que ser 12.
- Lo que pasa: Sale 12 en las cuatro.

Prueba 3: Numeros primos entre si
- Entrada: 8 y 15
- Lo que debería pasar: Como no comparten divisores tiene que dar 1.
- Lo que pasa: Da 1 en las 4 funciones.

Prueba 4: Numeros iguales para salir del programa
- Entrada: 8 y 8
- Lo que debería pasar: Dice que son iguales y se cierra el programa sin calcular nada.
- Lo que pasa: Muestra el mensaje de fin y sale del while.

Prueba 5: Meter texto o letras
- Entrada: Pongo 'hola' en el primer numero
- Lo que debería pasar: Salta error y me lo vuelve a pedir.
- Lo que pasa: Salta el error de numero entero y me deja meterlo otra vez.

Prueba 6: Meter cero o negativos
- Entrada: Pongo 0 y luego -5
- Lo que debería pasar: Salta que tiene que ser mayor que 0 y lo vuelve a pedir.
- Lo que pasa: Me avisa de que tiene que ser positivo y no se rompe.
"""
