# Ejercicio 5. Cálculo de una nómina simplificada (jamas he obtenido una nomina)

def calcular_salario(salario_base, complemento=0.0, deduccion=10.0): # Calcula el salario neto aplicando deducción
    salario_bruto = salario_base + complemento
    descuento = salario_bruto * (deduccion / 100)
    return salario_bruto - descuento # devuelve la restaaa

def mostrar_nomina(salario_base, complemento=0.0, deduccion=10.0, salario_final=None): # Muestra el desglose de la nómina
    # Si no se pasa el salario final, lo calculamos
    if salario_final is None: # vacio
        salario_final = calcular_salario(salario_base, complemento, deduccion)
    
    salario_bruto = salario_base + complemento
    importe_deduccion = salario_bruto * (deduccion / 100)

    print("--- NÓMINA SIMPLIFICADA ---")
    print(f"Salario base:       {salario_base:.2f} €") # .2f es que solo se muestran dos decimales
    print(f"Complemento:        {complemento:.2f} €")
    print(f"Salario bruto:      {salario_bruto:.2f} €")
    print(f"Deducción ({deduccion:.1f} %): -{importe_deduccion:.2f} €")
    print(f"Salario final:      {salario_final:.2f} €")
    print()

def main():
    # Caso 1: sólo indicamos el salario base (complemento y deducción por defecto)
    base1 = 1500.0
    final1 = calcular_salario(base1)
    mostrar_nomina(base1, salario_final=final1)

    # Caso 2: con complemento 
    base2 = 1500.0
    comp2 = 180.0
    final2 = calcular_salario(base2, complemento=comp2)
    mostrar_nomina(base2, complemento=comp2, salario_final=final2)

if __name__ == '__main__':
    main()
