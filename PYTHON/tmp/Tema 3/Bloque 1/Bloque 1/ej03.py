# Ejercicio 3. Análisis de una nota

def calcular_media(nota1, nota2, nota3): # Calcula la media de las tres notas xd
    return (nota1 + nota2 + nota3) / 3

def determinar_resultado(media): # Comprueba si está aprobado o suspenso
    if media >= 5:
        return "APROBADO"
    else:
        return "SUSPENSO"

def mostrar_informe(nota1, nota2, nota3, media, resultado): # Muestra el informe final asi bn lindo
    print("\n--- INFORME DE EVALUACIÓN ---")
    print(f"Prueba 1: {nota1:.2f}")
    print(f"Prueba 2: {nota2:.2f}")
    print(f"Prueba 3: {nota3:.2f}")
    print(f"Media: {media:.2f}")
    print(f"Resultado: {resultado}")

def main():
    # Pedimos las notas de las tres pruebas primerito
    nota1 = float(input("Nota de la primera prueba: "))
    nota2 = float(input("Nota de la segunda prueba: "))
    nota3 = float(input("Nota de la tercera prueba: "))

    # Calculamos la media y si aprueba con las funciones obv
    media = calcular_media(nota1, nota2, nota3)
    resultado = determinar_resultado(media)

    # Mostramos el resultado pq asi si funciona
    mostrar_informe(nota1, nota2, nota3, media, resultado)

if __name__ == '__main__':
    main()
