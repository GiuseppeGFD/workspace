# Ejercicio 12: Analiza el código
"""
Observa el siguiente programa:

for numero in range(2, 9):
    if numero == 5:
        continue

    if numero == 8:
        break

    print(numero)

Responde a las siguientes preguntas:
1. ¿Por qué el número 5 no aparece por pantalla?
2. ¿Por qué el número 8 tampoco aparece?
3. ¿Por qué los números anteriores sí aparecen?
4. ¿Qué diferencia existe entre el efecto de continue y el de break en este programa?
"""

print("--- Ejecución del programa original ---")
for numero in range(2, 9):
    if numero == 5:
        continue

    if numero == 8:
        break

    print(numero)

print("\n" + "=" * 65)