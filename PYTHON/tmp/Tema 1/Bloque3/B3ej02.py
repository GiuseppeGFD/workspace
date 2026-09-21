presupuesto = int(input("Cual es el presupuesto del hospital: "))
ginecologia = 0.40
traumatologia = 0.30
pedriatia = 0.30

print("=========PRESUPUESTOS==========")
print(f"Ginecologia = {presupuesto*ginecologia}€")
print(f"Traumatologia = {presupuesto*traumatologia}€")
print(f"Pediatria = {presupuesto*pedriatia}€")
print(f"Total: {(presupuesto*ginecologia)+(presupuesto*traumatologia)+(presupuesto*pedriatia)}€" )
print("================================")