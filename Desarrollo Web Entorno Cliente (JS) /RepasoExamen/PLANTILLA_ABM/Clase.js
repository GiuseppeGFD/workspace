// Parte 1. Clase Moto
// Marcado: // CAMBIO = corregido sobre tu código · // NUEVO = añadido

class Moto {
    constructor(marca, modelo, matricula, anioFabricacion, cilindrada, precio) {
        this._marca = marca;
        this._modelo = modelo;
        this._matricula = matricula;
        this._anioFabricacion = anioFabricacion;
        this._cilindrada = cilindrada;
        this._precio = precio;
    }

    get marca() { return this._marca; }
    get modelo() { return this._modelo; }
    get matricula() { return this._matricula; }
    get anioFabricacion() { return this._anioFabricacion; }
    get cilindrada() { return this._cilindrada; }
    get precio() { return this._precio; }

    // CAMBIO: un setter no devuelve nada (el return sobraba)
    set marca(marca) { this._marca = marca; }
    set modelo(modelo) { this._modelo = modelo; }
    set matricula(matricula) { this._matricula = matricula; }
    set anioFabricacion(anioFabricacion) { this._anioFabricacion = anioFabricacion; }
    set cilindrada(cilindrada) { this._cilindrada = cilindrada; }
    set precio(precio) { this._precio = precio; }

    antiguedad() {
        return new Date().getFullYear() - parseInt(this._anioFabricacion);   // CAMBIO: getFullYear() con paréntesis
    }

    categoria() {
        var cc = parseInt(this._cilindrada);
        if (cc <= 125) {                                // CAMBIO: "hasta 125" incluye el 125
            return 'Ciclomotor';
        } else if (cc <= 500) {                         // CAMBIO: "de 126 a 500" incluye el 500
            return 'Media';
        } else {
            return 'Gran cilindrada';
        }
    }

    esClasica() {
        return this.antiguedad() >= 25;
    }

    static listarMotos(array) {
        var ventana = window.open("", "ventana", "height=500,width=700");     // CAMBIO: window.open
        var table = '<table border=1><thead><tr><th>marca</th><th>modelo</th><th>matricula</th><th>año</th><th>cilindrada</th><th>categoria</th><th>precio</th></tr></thead><tbody>';
        var suma = 0;
        for (var i = 0; i < array.length; i++) {
            // NUEVO: Gran cilindrada en rojo
            var color = (array[i].categoria() == 'Gran cilindrada') ? 'red' : 'black';
            table += '<tr style="color:' + color + '">' + '<td>' + array[i].marca + '</td>' + '<td>' + array[i].modelo + '</td>' + '<td>' + array[i].matricula + '</td>' + '<td>' + array[i].anioFabricacion + '</td>' + '<td>' + array[i].cilindrada + '</td>' + '<td>' + array[i].categoria() + '</td>' + '<td>' + parseFloat(array[i].precio).toFixed(2) + '</td>' + '</tr>';
            suma += parseFloat(array[i].precio);
        }
        table += '</tbody></table>';
        // NUEVO: precio medio del stock mostrado (si no hay motos, no se divide entre 0)
        var media = (array.length > 0) ? suma / array.length : 0;
        table += '<p>Precio medio: ' + media.toFixed(2) + ' €</p>';
        table += '<br><input type="button" value="cerrar" onclick="window.close()">';
        ventana.document.write(table);
        ventana.document.close();                       // NUEVO
    }
}
