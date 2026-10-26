# Desarrolla un programa en Python 
# que simule el funcionamiento de 
# un servicio técnico informático, 
# permitiendo calcular presupuestos 
# de reparación y comprobar si una 
# reparación es viable según el 
# presupuesto disponible del cliente.

# Funcionamiento

# NOTICE: profe iba a poner lo de time para que dira tiempo cuando mostraba la opcion 1 y 3
# para que se pueda leer pero se me hace bola el codigo y lo intenté segmentar lo mas q pude.

#==============Mostrar el menú por pantalla=====================
def mostrarMenu(): # mostrar menu
    print('--------------------Menu--------------------')
    print('     1. Consultar tipos de reparación')
    print('     2. Evaluar una reparación.      ')
    print('     3. Consultar condiciones del servicio')
    print('     0. Salir')
    print('--------------------------------------------')
#================================================================

#===================CONDICIONES DE SERVICIO======================
def mostrarCondiciones(): # mostrar condiciones
    # Se mostrarán las condiciones económicas y los 
    # límites establecidos para realizar las reparaciones:
    print('---------------------------------------CONDICIONES----------------------------------------')
    print('   1  Coste de la mano de obra: 25 € por hora.                                            ')
    print('   2  Duración máxima de una reparación: 8 horas.                                         ')
    print('   3  El presupuesto máximo del cliente debe ser mayor que 0.                             ')
    print('   4  La reparación será viable si su coste total no supera el presupuesto disponible.    ')
    print('------------------------------------------------------------------------------------------')
#================================================================

#================Seleccionar opcion del menu=====================
def seleccionarOpcion(): # elegir opcion del menu
    opcion = int(input('Ingresa una opción del menú: '))
    if opcion < 0 or opcion > 3:
        raise ValueError('Opción de menú inexistente.')
    return opcion 
#================================================================

#====================TIPO DE REPARACION==========================
def consultarTiposReparacion():
    print('---------------------TIPO DE REPARACIÓN---------------------')
    print('     1. Sustitución de disco SSD (65 €)')
    print('     2. Ampliación de memoria RAM (40 €)')
    print('     3. Sustitución de fuente de alimentación (55 €)')
    print('     4. Reparación de software (0 €)')
    print('------------------------------------------------------------\n')

def obtenerCostePiezas(tipo):
    if tipo == 1:
        coste = 65.0
    elif tipo == 2:
        coste = 40.0
    elif tipo == 3:
        coste = 55.0
    elif tipo == 4:
        coste = 0.0
    else:
        raise ValueError('Tipo de reparación inexistente.')
    return coste

def obtenerNombreReparacion(tipo):
    if tipo == 1:
        nombre = 'Sustitución de disco SSD'
    elif tipo == 2:
        nombre = 'Ampliación de memoria RAM'
    elif tipo == 3:
        nombre = 'Sustitución de fuente de alimentación'
    elif tipo == 4:
        nombre = 'Reparación de software'
    else:
        raise ValueError('Tipo de reparación inexistente.')
    return nombre
#================================================================

#=====================HORAS REPARACION=========================
def preguntarHoras():
    horas = float(input('Ingresa el número de horas de trabajo: '))
    if horas <= 0 or horas > 8:
        raise ValueError('Las horas deben ser mayores que 0 y menores o iguales que 8.')
    return horas
#================================================================

#=====================PRESUPUESTO MAXIMO=========================
def preguntarPresupuesto():
    dinerito = float(input('Ingresa tu presupuesto máximo: '))
    if dinerito <= 0:
        raise ValueError('El presupuesto máximo debe ser un número mayor que 0.')
    return dinerito
#================================================================

#=====================EVALUAR REPARACION=========================
def evaluarReparacion(tipo, horas, presupuesto):
    coste_piezas = obtenerCostePiezas(tipo)
    nombre_reparacion = obtenerNombreReparacion(tipo)
    
    coste_mano_obra = horas * 25.0
    coste_total = coste_piezas + coste_mano_obra
    
    print('\n-------------------PRESUPUESTO-------------------')
    print(f'Tipo de reparación: {nombre_reparacion}')
    print(f'Coste de las piezas: {coste_piezas:.2f} €')
    print(f'Coste de la mano de obra: {coste_mano_obra:.2f} €')
    print(f'Coste total de la reparación: {coste_total:.2f} €')
    print(f'Presupuesto máximo disponible: {presupuesto:.2f} €')
    
    if coste_total <= presupuesto:
        print('Resultado: La reparación es VIABLE.')
    else:
        falta = coste_total - presupuesto
        print('Resultado: La reparación NO es viable.')
        print(f'Dinero adicional necesario: {falta:.2f} €')
    print('--------------------------------------------------\n')
#================================================================

#============================MAIN================================
def main():
    opcion = None # tmb me sirvió -1 en vdd pero asi se ve mejor
    while opcion != 0:
        mostrarMenu() # imprime
        try:
            opcion = seleccionarOpcion() # tomo la opcion
            
            if opcion == 1: # si e uno muestro
                consultarTiposReparacion()
            elif opcion == 2: # si es dos muestro y tomo valor
                consultarTiposReparacion()
                tipo = int(input('Selecciona el tipo de reparación (1-4): '))
                coste_piezas = obtenerCostePiezas(tipo) # Valida el tipo
                
                horas = preguntarHoras() # pregunto horas
                presupuesto = preguntarPresupuesto() # presupuesto
                
                evaluarReparacion(tipo, horas, presupuesto) # evaluamo
            elif opcion == 3: # imprime en pantallica
                mostrarCondiciones()
            elif opcion == 0: # sale
                print('\n¡Muchas gracias por usar el servicio técnico! Hasta luego.\n')
                
        except ValueError as error: # saca los errores la mayoria de numeros
            print(f'\n[ERROR]: {error}\n')
        except Exception: # excepcion general para los q no sean value error
            print('\n[ERROR]: Has introducido un dato no válido.\n')

#================================================================

if __name__ == '__main__':
    main()

# PRUEBAS
"""
Prueba 1: Consultar tipos de reparación
- Entrada: 1
- Lo que debería pasar:mostrarme la lista de reparaciones.
- Lo que pasa: me sale bien

Prueba 2: Evaluar una reparación que sí se puede pagar
- Entrada: Opción 2 = 1 (SSD 65€) -> 2  -> Presupuesto 150€
- Lo que debería pasar: 
    * Piezas: 65.00 €
    * Mano de obra: 50.00 € (2h * 25€)
    * Total: 115.00 €
    * deberia decir que es viable 
- Lo que pasa: ta todo bien y es viable

Prueba 3: Evaluar una reparación que se pasa del presupuesto
- Entrada: Opción 2 -> 3 (Fuente 55€) -> 4 horas -> Presupuesto 100€
- Lo que debería pasar:
    * Total: 155.00 €
    * no viable porque el presupuesto es 100
- Lo que pasa: lo marca como no viable

Prueba 4: Meter una opción del menú que no existe
- Entrada: Pongo un 5 
- Lo que debería pasar: salta erro
- Lo que pasa: Sale el error de valueError por el raise

Prueba 5: Meter más horas de la cuenta
- Entrada: En horas pongo 10
- Lo que debería pasar: Salta la excepción de que no se pueden poner más de 8 horas.
- Lo que pasa: lo captura

Prueba 6: Meter texto en vez de números
- Entrada: En el presupuesto pongo a
- Lo que debería pasar: salta el exception value
- Lo que pasa: Imprime sale que meti un valor q no es un numerito

Prueba 7: Salir
- Entrada: Pongo un 0
- Lo que debería pasar: sale
- Lo que pasa: sale
"""