// Array de humanos por defecto y variables globales de estado
var humanos = [
    new Humano("Pepe", 66, 30),
    new Humano("Juan", 59, 23),
    new Humano("Andrés", 73, 40),
    new Humano("Antonio", 90, 40)
];

var pos = 0;
var operacion = ""; // Puede ser "ALTA", "BAJA" o "MODIFICACION"

// Se ejecuta al cargar la página
function iniciar() {
    modoNormal();
    mostrarRegistro();
}

// Muestra en los input el humano correspondiente a la posición actual usando getters
function mostrarRegistro() {
    document.getElementById("error").innerHTML = "";
    if (humanos.length > 0) {
        document.getElementById("nombre").value = humanos[pos].nombre;
        document.getElementById("peso").value = humanos[pos].peso;
        document.getElementById("edad").value = humanos[pos].edad;
    } else {
        limpiarCajas();
    }
}

function limpiarCajas() {
    document.getElementById("nombre").value = "";
    document.getElementById("peso").value = "";
    document.getElementById("edad").value = "";
}

// --- CONTROL DE ESTADO DE BOTONES ---
function modoNormal() {
    operacion = "";
    document.getElementById("error").innerHTML = "";

    var hayDatos = humanos.length > 0;
    document.getElementById("btnPrimera").disabled = !hayDatos;
    document.getElementById("btnAnterior").disabled = !hayDatos;
    document.getElementById("btnSiguiente").disabled = !hayDatos;
    document.getElementById("btnUltima").disabled = !hayDatos;

    document.getElementById("btnComer").disabled = !hayDatos;
    document.getElementById("btnCorrer").disabled = !hayDatos;

    document.getElementById("btnAlta").disabled = false;
    document.getElementById("btnBaja").disabled = !hayDatos;
    document.getElementById("btnModificacion").disabled = !hayDatos;

    document.getElementById("btnListado").disabled = !hayDatos;
    document.getElementById("btnOtroListado").disabled = !hayDatos;
    document.getElementById("btnMuestraUna").disabled = !hayDatos;

    // En modo normal Aceptar y Cancelar están deshabilitados
    document.getElementById("btnAceptar").disabled = true;
    document.getElementById("btnCancelar").disabled = true;

    // Las cajas son solo de lectura en modo navegación
    document.getElementById("nombre").readOnly = true;
    document.getElementById("peso").readOnly = true;
    document.getElementById("edad").readOnly = true;
}

function modoEdicion(permitirNavegar, cajasEditables) {
    document.getElementById("btnPrimera").disabled = !permitirNavegar;
    document.getElementById("btnAnterior").disabled = !permitirNavegar;
    document.getElementById("btnSiguiente").disabled = !permitirNavegar;
    document.getElementById("btnUltima").disabled = !permitirNavegar;

    document.getElementById("btnComer").disabled = true;
    document.getElementById("btnCorrer").disabled = true;

    document.getElementById("btnAlta").disabled = true;
    document.getElementById("btnBaja").disabled = true;
    document.getElementById("btnModificacion").disabled = true;

    document.getElementById("btnAceptar").disabled = false;
    document.getElementById("btnCancelar").disabled = false;

    document.getElementById("nombre").readOnly = !cajasEditables;
    document.getElementById("peso").readOnly = !cajasEditables;
    document.getElementById("edad").readOnly = !cajasEditables;
}

// --- NAVEGACIÓN ---
function primera() {
    if (humanos.length > 0) {
        pos = 0;
        mostrarRegistro();
    }
}

function anterior() {
    if (pos > 0) {
        pos--;
        mostrarRegistro();
    }
}

function siguiente() {
    if (pos < humanos.length - 1) {
        pos++;
        mostrarRegistro();
    }
}

function ultima() {
    if (humanos.length > 0) {
        pos = humanos.length - 1;
        mostrarRegistro();
    }
}

// --- ACCIONES DE PESO ---
function comer() {
    if (humanos.length > 0) {
        humanos[pos].comer();
        mostrarRegistro();
    }
}

function correr() {
    if (humanos.length > 0) {
        humanos[pos].correr();
        mostrarRegistro();
    }
}

// --- OPERACIONES CRUD ---
function alta() {
    operacion = "ALTA";
    limpiarCajas();
    // En Alta no se navega y se habilitan las cajas
    modoEdicion(false, true);
    document.getElementById("nombre").focus();
}

function baja() {
    if (humanos.length === 0) return;
    operacion = "BAJA";
    // En Baja se puede navegar para elegir qué registro eliminar, cajas bloqueadas
    modoEdicion(true, false);
}

function modificacion() {
    if (humanos.length === 0) return;
    operacion = "MODIFICACION";
    // En Modificación se puede navegar y editar las cajas
    modoEdicion(true, true);
    document.getElementById("nombre").focus();
}

function cancelar() {
    modoNormal();
    mostrarRegistro();
}

function aceptar() {
    var divError = document.getElementById("error");
    divError.innerHTML = "";

    if (operacion === "ALTA") {
        var nombre = document.getElementById("nombre").value;
        var peso = document.getElementById("peso").value;
        var edad = document.getElementById("edad").value;

        var mensajeError = validarDatos(nombre, peso, edad);
        if (mensajeError !== "") {
            divError.innerHTML = mensajeError;
            return;
        }

        if (confirm("¿Desea dar de alta a " + nombre + "?")) {
            var nuevoHumano = new Humano(nombre, peso, edad);
            humanos.push(nuevoHumano);
            pos = humanos.length - 1;
            modoNormal();
            mostrarRegistro();
        }

    } else if (operacion === "BAJA") {
        if (confirm("¿Está seguro de dar de baja a " + humanos[pos].nombre + "?")) {
            humanos.splice(pos, 1);
            if (pos >= humanos.length && humanos.length > 0) {
                pos = humanos.length - 1;
            } else if (humanos.length === 0) {
                pos = 0;
            }
            modoNormal();
            mostrarRegistro();
        }

    } else if (operacion === "MODIFICACION") {
        var nombreMod = document.getElementById("nombre").value;
        var pesoMod = document.getElementById("peso").value;
        var edadMod = document.getElementById("edad").value;

        var mensajeErrorMod = validarDatos(nombreMod, pesoMod, edadMod);
        if (mensajeErrorMod !== "") {
            divError.innerHTML = mensajeErrorMod;
            return;
        }

        if (confirm("¿Desea modificar los datos de " + humanos[pos].nombre + "?")) {
            // Actualizamos usando los setters de la clase
            humanos[pos].nombre = nombreMod;
            humanos[pos].peso = pesoMod;
            humanos[pos].edad = edadMod;
            modoNormal();
            mostrarRegistro();
        }
    }
}

// --- VALIDACIÓN ESTRICTA EN JAVASCRIPT ---
function validarDatos(nombre, peso, edad) {
    // 1. Validar Nombre: alfabético + ñ, ç, vocales acentuadas, máximo 20 caracteres
    var letrasValidas = "abcdefghijklmnñopqrstuvwxyzçáéíóúüABCDEFGHIJKLMNÑOPQRSTUVWXYZÇÁÉÍÓÚÜ ";
    if (nombre.trim().length === 0) {
        return "Error: El nombre no puede estar vacío.";
    }
    if (nombre.length > 20) {
        return "Error: El nombre no puede superar los 20 caracteres.";
    }
    for (var i = 0; i < nombre.length; i++) {
        if (letrasValidas.indexOf(nombre.charAt(i)) === -1) {
            return "Error: El nombre solo admite caracteres alfabéticos (incluidas ñ, ç y vocales acentuadas).";
        }
    }

    // 2. Validar Peso: caracteres numéricos del 0 al 9
    if (!esNumericoEntero(peso)) {
        return "Error: El peso debe contener solo caracteres numéricos del 0 al 9.";
    }

    // 3. Validar Edad: caracteres numéricos del 0 al 9
    if (!esNumericoEntero(edad)) {
        return "Error: La edad debe contener solo caracteres numéricos del 0 al 9.";
    }

    return "";
}

function esNumericoEntero(cadena) {
    var digitos = "0123456789";
    if (cadena.length === 0) {
        return false;
    }
    for (var i = 0; i < cadena.length; i++) {
        if (digitos.indexOf(cadena.charAt(i)) === -1) {
            return false;
        }
    }
    return true;
}

// --- LISTADOS ---
function listado() {
    if (humanos.length > 0) {
        Humano.listado(humanos);
    }
}

function muestraUnaPersona() {
    if (humanos.length > 0) {
        Humano.muestraUnaPersona(humanos[pos]);
    }
}

// Listado externo que NO forma parte de la clase Humano
function otroListado() {
    if (humanos.length === 0) return;

    var ventana = window.open("", "", "width=500,height=450");
    var html = "<html><head><title>Listado en Ventana</title></head><body style='text-align:center;'>";
    html += "<h2>Listado de personas NO FORMA PARTE DE LA CLASE</h2>";
    html += "<table border='1' style='margin: 20px auto; border-collapse: collapse;' cellpadding='5'>";
    html += "<tr><th>Nombre</th><th>Peso</th><th>Edad</th><th>Categoria</th></tr>";

    for (var i = 0; i < humanos.length; i++) {
        html += "<tr>";
        html += "<td>" + humanos[i].nombre + "</td>";
        html += "<td>" + humanos[i].peso + "</td>";
        html += "<td>" + humanos[i].edad + "</td>";
        html += "<td>" + humanos[i].categoria() + "</td>";
        html += "</tr>";
    }

    html += "</table>";
    html += "<input type='button' value='Cerrar ventana' onclick='window.close()'>";
    html += "</body></html>";

    ventana.document.write(html);
    ventana.document.close();
}