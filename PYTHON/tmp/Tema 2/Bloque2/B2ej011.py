# Días del mes
# Solicita al usuario un número de mes entre 1 y 12 
# e indica cuántos días tiene ese mes.

mes = int(input("De que mes quieres el numero de días [1-12]: "))

match mes:
    case 1: dias = 31
    case 2: dias = 28
    case 3: dias = 31
    case 4: dias = 30
    case 5: dias = 31
    case 6: dias = 30
    case 7: dias = 31
    case 8: dias = 31
    case 9: dias = 30
    case 10: dias = 31
    case 11: dias = 30
    case 12: dias = 31

print("======================================")
print("")
print(f"El mes numero {mes} tiene {dias} dias")
print("")
print("======================================")
