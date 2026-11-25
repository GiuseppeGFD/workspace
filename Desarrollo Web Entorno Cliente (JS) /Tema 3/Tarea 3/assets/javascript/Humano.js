class Humano {
    constructor(nombre, peso, edad) {
        this._nombre = nombre;
        this._peso = Number(peso);
        this._edad = Number(edad);
    }

    // Getters y Setters para todos los atributos
    get nombre() {
        return this._nombre;
    }

    set nombre(valor) {
        this._nombre = valor;
    }

    get peso() {
        return this._peso;
    }

    set peso(valor) {
        this._peso = Number(valor);
    }

    get edad() {
        return this._edad;
    }

    set edad(valor) {
        this._edad = Number(valor);
    }

    // Métodos de instancia
    comer() {
        this.peso = this.peso + 1;
    }

    correr() {
        if (this.peso > 0) {
            this.peso = this.peso - 1;
        }
    }

    categoria() {
        var e = this.edad;
        if (e < 10 || e > 79) {
            return "Fuera de categoría";
        } else if (e >= 10 && e <= 11) {
            return "Benjamín";
        } else if (e >= 12 && e <= 13) {
            return "Alevín";
        } else if (e >= 14 && e <= 15) {
            return "Infantil";
        } else if (e >= 16 && e <= 17) {
            return "Cadete";
        } else if (e >= 18 && e <= 19) {
            return "Junior";
        } else if (e >= 20 && e <= 29) {
            return "Senior 20";
        } else if (e >= 30 && e <= 39) {
            return "Senior 30";
        } else if (e >= 40 && e <= 49) {
            return "Senior 40";
        } else if (e >= 50 && e <= 59) {
            return "Senior 50";
        } else if (e >= 60 && e <= 69) {
            return "Senior 60";
        } else if (e >= 70 && e <= 79) {
            return "Senior 70";
        }
    }

    // Método estático: muestra en una ventana emergente todos los humanos del array
    static listado(arrayHumanos) {
        var ventana = window.open("", "", "width=500,height=400");
        var html = "<html><head><title>Listado</title></head><body style='text-align:center;'>";
        html += "<table border='1' style='margin: 20px auto; border-collapse: collapse;' cellpadding='5'>";
        html += "<tr><th>Nombre</th><th>Peso</th><th>Edad</th><th>Categoria</th></tr>";

        for (var i = 0; i < arrayHumanos.length; i++) {
            html += "<tr>";
            html += "<td>" + arrayHumanos[i].nombre + "</td>";
            html += "<td>" + arrayHumanos[i].peso + "</td>";
            html += "<td>" + arrayHumanos[i].edad + "</td>";
            html += "<td>" + arrayHumanos[i].categoria() + "</td>";
            html += "</tr>";
        }

        html += "</table>";
        html += "<input type='button' value='Cerrar' onclick='window.close()'>";
        html += "</body></html>";

        ventana.document.write(html);
        ventana.document.close();
    }

    // Método estático: muestra en una ventana emergente un único humano
    static muestraUnaPersona(humano) {
        var ventana = window.open("", "", "width=500,height=300");
        var html = "<html><head><title>Muestra una persona</title></head><body style='text-align:center;'>";
        html += "<table border='1' style='margin: 20px auto; border-collapse: collapse;' cellpadding='5'>";
        html += "<tr><th>Nombre</th><th>Peso</th><th>Edad</th><th>Categoria</th></tr>";
        html += "<tr>";
        html += "<td>" + humano.nombre + "</td>";
        html += "<td>" + humano.peso + "</td>";
        html += "<td>" + humano.edad + "</td>";
        html += "<td>" + humano.categoria() + "</td>";
        html += "</tr>";
        html += "</table>";
        html += "<input type='button' value='Cerrar' onclick='window.close()'>";
        html += "</body></html>";

        ventana.document.write(html);
        ventana.document.close();
    }
}