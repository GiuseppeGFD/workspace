import time # para ponerlo a dormir aveces
import os # para limpiar el cmd que luego se me llenaba de menus
# 10. Cajero automático
"""
Simula un pequeño cajero automático con un saldo inicial de 1.000 €.

El programa debe mostrar y repetir el siguiente menú:

1. Consultar saldo
2. Retirar dinero
3. Ingresar dinero
0. Salir
El programa debe controlar mediante excepciones 
las situaciones que puedan producirse:

Opciones que no sean números enteros.
Opciones que no existan en el menú.
Cantidades que no sean números.
Retiradas superiores al saldo disponible.
Cantidades negativas o iguales a cero.
Después de cualquier entrada incorrecta, el programa 
debe continuar funcionando y volver a mostrar el menú.

La opción 0 debe finalizar el programa.

Este ejercicio debe integrar los contenidos trabajados 
en los ejercicios anteriores: excepciones, selección, 
repetición, contadores, acumuladores, break y continue."""



# MAIN
saldo = 1000 # declaracion cantidad inicial



while True:
    print("==========================")
    print("=  [1] Consultar saldo.  =")
    print("=  [2] Retirar Dinero    =")
    print("=  [3] Ingresar dinero   =")
    print("=  [0] salir             =")
    print("==========================")

    try:
        n = int(input("Selecciona tu opción: "))
        
        print("\nProcesando...")
        time.sleep(2)
        os.system('cls' if os.name == 'nt' else 'clear')

        if (n == 1): # opcion 1

            print("***********************")
            print(f"Tu saldo es de {saldo}")
            print("***********************")
            time.sleep(2)


            
        elif (n == 2): # opcion 2

            print("******************************")
            print("¿Cuanto dinero deseas retirar?")
            print("******************************")
            ret = int(input("importe: "))
            print("Procesando...")
            time.sleep(2)

            if (ret <= saldo and ret > 0): # sub opcion 2.1

                print("\nProcesando...")
                time.sleep(2)
                saldo = saldo - ret
                print("**********************")
                print("Transacción finalizada")
                print("**********************")

            else: # sub opcion 2.2

                print("\nProcesando...")
                time.sleep(2)
                print("Saldo o valor no disponible")

        elif (n == 3): # opcion 3
            print("*******************************")
            print("¿Cuanto dinero deseas ingresar?")
            ing = int(input("Importe: "))
            print("*******************************")
            print("\nProcesando...")
            time.sleep(2)
            if (ing > 0):       # sub opcion 3.1
                saldo = saldo + ing
                print("########################")
                print("   ¡Operacion Exitosa!  ")
                print("########################")
            else:               # sub opcion 3.2
                print("ERROR: ¡INGRESO INVALIDO!")
        elif (n == 0):          # opcion 4 de salir
            print("¿Estás seguro de que deseas salir?(y/n)")
            resp = input("respuesta: ")
            if (resp.lower() == "y"): # sub opcion 4.1 de si
                print("¡Hasta luego!")
                break
            elif (resp.lower() == "n"):     # sub opcion de 4.2 de cancelar
                print("Ok")
            else:
                print("Opcion no válida, Stay en el programa")

    except ValueError as e:
        print(f"Error: {e}")
    finally:
        print("----------------------------------")