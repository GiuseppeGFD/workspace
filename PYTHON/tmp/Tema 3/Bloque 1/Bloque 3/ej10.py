# Ejercicio 10. Informe de evaluación

def calcular_nota_final(nota_examen, nota_practica, peso_examen=60, peso_practica=40): # Calcula la media ponderada
    return (nota_examen * peso_examen / 100) + (nota_practica * peso_practica / 100)

def mostrar_informe(nota_examen, nota_practica, peso_examen, peso_practica, nota_final): # Muestra el informe y si supera la asignatura
    if nota_final >= 5.0:
        resultado = "evaluación superada"
    else:
        resultado = "evaluación no superada"

    print("--- INFORME DE EVALUACIÓN ---")
    print(f"Nota del examen: {nota_examen:.2f}")
    print(f"Nota de la práctica: {nota_practica:.2f}")
    print(f"Ponderación del examen: {peso_examen}%")
    print(f"Ponderación de la práctica: {peso_practica}%")
    print(f"Nota final: {nota_final:.2f}")
    print(f"Resultado: {resultado}")
    print()

def main():
    # Caso 1: usando las ponderaciones por defecto (60% examen, 40% práctica)
    examen1 = 6.0
    practica1 = 7.0
    final1 = calcular_nota_final(examen1, practica1)
    mostrar_informe(examen1, practica1, 60, 40, final1)

    # Caso 2: cambiando las ponderaciones usando argumentos nominales (70% examen, 30% práctica)
    examen2 = 4.5
    practica2 = 8.0
    p_examen = 70
    p_practica = 30
    final2 = calcular_nota_final(examen2, practica2, peso_examen=p_examen, peso_practica=p_practica)
    mostrar_informe(examen2, practica2, p_examen, p_practica, final2)

if __name__ == '__main__':
    main()
