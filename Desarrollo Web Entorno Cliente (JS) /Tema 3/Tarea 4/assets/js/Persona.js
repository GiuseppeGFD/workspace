/* ===================================================================
   CLASE PERSONA  (solo datos y operaciones sobre UNA persona o un array)
   La clase NO toca el formulario: eso lo hace script.js.
   =================================================================== */
class Persona {
    constructor(nombre, apellidos, direccion, fechaNacimiento, genero, codigoPostal) {
        this._nombre = nombre;
        this._apellidos = apellidos;
        this._direccion = direccion;
        this._fechaNacimiento = fechaNacimiento;   // un objeto Date
        this._genero = genero;                     // "Masculino" o "Femenino"
        this._codigoPostal = codigoPostal;         // CADENA: "08001" perdería el 0 si fuese número
    }

    // ---------- getters y setters (uno por atributo) ----------
    get nombre() { return this._nombre; }
    set nombre(valor) { this._nombre = valor; }
    get apellidos() { return this._apellidos; }
    set apellidos(valor) { this._apellidos = valor; }
    get direccion() { return this._direccion; }
    set direccion(valor) { this._direccion = valor; }
    get fechaNacimiento() { return this._fechaNacimiento; }
    set fechaNacimiento(valor) { this._fechaNacimiento = valor; }
    get genero() { return this._genero; }
    set genero(valor) { this._genero = valor; }
    get codigoPostal() { return this._codigoPostal; }
    set codigoPostal(valor) { this._codigoPostal = valor; }

    // ---------- métodos de cálculo (devuelven, no escriben en pantalla) ----------
    edad() {
        var hoy = new Date();
        var f = this._fechaNacimiento;
        var e = hoy.getFullYear() - f.getFullYear();
        // si todavía no ha cumplido años este año, se resta 1
        if (hoy.getMonth() < f.getMonth() ||
            (hoy.getMonth() == f.getMonth() && hoy.getDate() < f.getDate())) {
            e--;
        }
        return e;
    }

    tratamiento() {                                // "Señor o Señora"
        return this._genero == "Masculino" ? "Sr" : "Sra";
    }

    fechaTexto() {                                 // Date -> "dd/mm/aaaa" con ceros
        var d = this._fechaNacimiento.getDate();
        var m = this._fechaNacimiento.getMonth() + 1;      // los meses van de 0 a 11
        return (d < 10 ? "0" + d : d) + "/" + (m < 10 ? "0" + m : m) + "/" +
            this._fechaNacimiento.getFullYear();
    }

    // ---------- listados ----------
    // Una fila de la tabla (la comparten los dos listados)
    filaTabla() {
        return "<tr><td>" + this.tratamiento() + " " + this._nombre + "</td><td>" + this._apellidos +
            "</td><td>" + this._direccion + "</td><td>" + this.fechaTexto() +
            "</td><td>" + this.edad() + "</td><td>" + this._genero +
            "</td><td>" + this._codigoPostal + "</td></tr>";
    }

    // Método de instancia: se llama  persona.listarPersona()
    listarPersona() {
        Persona.abrirVentana("Una persona", this.filaTabla());
    }

    // Método ESTÁTICO: se llama  Persona.listarPersonas(array)
    static listarPersonas(array) {
        var filas = "";
        for (var p of array) {
            filas += p.filaTabla();
        }
        Persona.abrirVentana("Listado de personas", filas);
    }

    // Auxiliar estático: abre la ventana emergente con la tabla
    static abrirVentana(titulo, filas) {
        var v = window.open("", "", "width=900, height=350, top=100, left=100");
        v.document.write("<html><head><meta charset='UTF-8'><title>" + titulo + "</title></head><body>");
        v.document.write("<h3>" + titulo + "</h3><table border='1'><tr><th>Nombre</th><th>Apellidos</th>" +
            "<th>Dirección</th><th>Fecha de nacimiento</th><th>Edad</th><th>Género</th>" +
            "<th>Código postal</th></tr>" + filas + "</table><br>" +
            "<input type='button' value='Cerrar' onclick='window.close()'></body></html>");
        v.document.close();
    }
}
