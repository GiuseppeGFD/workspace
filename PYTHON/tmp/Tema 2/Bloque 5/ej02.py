# 2. Máquina expendedora: diagnostica y corrige el error
"""Una máquina expendedora dispone de tres productos:
Código A: 1,50 €.
Código B: 2,00 €.
Código C: 2,50 €.
Si el código introducido no existe, debe mostrarse «Código no válido» 
y no debe continuar el proceso de cálculo del precio. Si el dinero 
disponible no es suficiente, debe indicarse cuánto dinero falta. 
Si es suficiente, se debe mostrar el producto servido y el cambio.
"""
codigo = input("Introduce el código del producto: ")


match codigo:
    case "A":
        precio = 1.50
    case "B":
        precio = 2.00
    case "C":
        precio = 2.50
    case _:
        print("Código no válido")

try:
    dinero = round(abs(float(input("Introduce el dinero disponible: "))),2)
    if dinero >= precio:
        cambio = dinero - precio
        print("Producto servido")
        print(f"Cambio: {cambio:.2f}€")
    elif dinero < precio:
        falta = precio - dinero
        print("Dinero insuficiente")
        print(f"Falta: {falta:.2f} €")
    else:
        print("Error Desconocido")
except NameError as e:
    print(f"Error: El producto no existe")
except ValueError as e:
    print(f"Error: Valor no valido")

"""Diseña diferentes casos de prueba para los códigos A, B y C.
Incluye al menos una prueba con dinero suficiente y otra con dinero insuficiente.
Prueba también un código que no exista, por ejemplo, D.
Anota el resultado esperado y el resultado obtenido.
Identifica en qué situación aparece el error.
Indica qué tipo de error se produce y explica por qué.
Corrige el programa utilizando únicamente los contenidos trabajados en clase.
Vuelve a realizar las pruebas necesarias para comprobar la corrección."""

# Primer Casos de Uso
# Caso 1: Entrada [A, 1.50], Salida = Producto servido, Cambio 0.0€
# Caso 2: Entrada [A, 1.49], Salida = Dinero insuficiente, Falta: 0.010000000000000009 €
# Caso 3: Entrada [B, 2.00], Salida = Producto servido, Cambio 0.0€
# Caso 4: Entrada [B, 1.99], Salida = Dinero insuficiente, Falta: 0.010000000000000009 €
# Caso 5: Entrada [C, 2.50], Salida = Producto servido, Cambio 0.0€
# Caso 6: Entrada [C, 2.49], Salida = Dinero insuficiente, Falta: 0.009999999999999787 €
# Caso 7: Entrada [D, 1.00], Salida = NameError: name 'precio' is not defined

# Segundo Casos de Uso
# Caso 1: Entrada [A, 1.50], Salida = Producto servido, Cambio 0.0€
# Caso 2: Entrada [A, 1.49], Salida = Dinero insuficiente, Falta: 0.01 €
# Caso 3: Entrada [B, 2.00], Salida = Producto servido, Cambio 0.0€
# Caso 4: Entrada [B, 1.99], Salida = Dinero insuficiente, Falta: 0.01 €
# Caso 5: Entrada [C, 2.50], Salida = Producto servido, Cambio 0.0€
# Caso 6: Entrada [C, 2.49], Salida = Dinero insuficiente, Falta: 0.01 €
# Caso 7: Entrada [F, 3.00], Salida = Código no válido Error: El producto no existe

# Respuestas:
# - Cuándo da error: Al meter una letra que no sea A, B o C (como D o F).
# - Tipo de error y por qué: Da un error de ejecución (NameError). En el 'case _:' avisa de código no válido pero no crea la variable precio, así que al hacer 'if dinero >= precio' el programa peta porque precio no existe.
# - Corrección: Controlar con try-except el NameError para que si el producto no existe avise y no rompa el programa.