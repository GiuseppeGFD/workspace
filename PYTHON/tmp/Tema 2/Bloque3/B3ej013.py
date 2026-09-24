# Triángulo válido
# los tres ángulos deben
# ser positivos y su suma
# debe ser exactamente 180 grados.

a1 = float(input("Ingresa el primer angulo: "))
a2 = float(input("Ingresa el segundo angulo: "))
a3 = float(input("Ingresa el tercer angulo: "))

if (a1 + a2 + a3 == 180):
    print(f"Triangulo VALIDO, la suma de {a1}, {a2} y {a3} es {a1 + a2 + a3} grados")
else:
    print(f"Triangulo INVALIDO, la suma de {a1}, {a2} y {a3} es {a1 + a2 + a3} grados")
