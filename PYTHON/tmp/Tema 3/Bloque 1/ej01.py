# Ejercicio 1. Preparación de una sesión de cine

from datetime import datetime # para usar la hora

def mostrar_bienvenida(): # Mostrar mensaje de Bienvenida
    print("========================================")
    print("¡Bienvenido/a a nuestra sesión de cine!")
    print("========================================")

def mostrar_informacion_pelicula(nombre, inicio, fin):
    print("Información de la pelicula")
    print(f"Película: {nombre}")
    calcular_duracion(inicio, fin)

def calcular_duracion(inicio, fin): # Calcular duracion
    duracion = fin - inicio
    print(f"duración: {duracion}")

def mostrar_horario(inicio, fin):
    print("\nHorario de la sesión")
    print(f"Hora de inicio: {inicio}")
    print(f"Hora de finalización: {fin}")


def main():
    nombre = "Interstellar" 
    inicio = datetime(2026,6,27,18,30,0)
    fin = datetime(2026,6,27,21,19,0)

    mostrar_bienvenida()
    mostrar_informacion_pelicula(nombre, inicio, fin)

    mostrar_horario(inicio, fin)

if __name__ == '__main__':
    main()