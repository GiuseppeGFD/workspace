total_segundos = int(input("Introduce los segundos: "))

horas = total_segundos // 3600

segundos_sobrantes = total_segundos % 3600

minutos = segundos_sobrantes // 60

segundos = segundos_sobrantes % 60

print("Son:", horas, "horas,", minutos, "minutos y", segundos, "segundos.")