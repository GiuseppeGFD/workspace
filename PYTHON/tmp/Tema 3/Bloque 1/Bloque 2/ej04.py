# Ejercicio 4. Generador de mensajes locura

def generar_mensaje(destinatario, texto, saludo="Hola"): # Genera el texto personalizado con saludo por defecto
    return f"{saludo}, {destinatario}. {texto}"

def main():
    # Llamada con saludo por defecto 
    mensaje1 = generar_mensaje("Lucía", "La reunión será a las 10.")
    print(mensaje1)

    # Llamada usando argumentos posicionales con otro saludo
    mensaje2 = generar_mensaje("Mario", "Tu pedido está preparado.", "Buenos días")
    print(mensaje2)

    # Llamada con argumentos nominales (variable y texto)
    mensaje3 = generar_mensaje(destinatario="Ana", texto="Recuerda entregar la actividad.", saludo="Buenas tardes")
    print(mensaje3)

    # Llamada con argumentos nominales y saludo por defecto
    mensaje4 = generar_mensaje(texto="Gracias por tu colaboración.", destinatario="Pablo")
    print(mensaje4)

if __name__ == '__main__':
    main()
