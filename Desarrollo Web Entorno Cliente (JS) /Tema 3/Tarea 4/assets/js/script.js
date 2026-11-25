/* ===================================================================
   1. DATOS Y ESTADO
   =================================================================== */
var personas = [
    new Persona("Ana", "López Pérez", "Calle Mayor 12", new Date(1990, 4, 15), "Femenino", "28001"),
    new Persona("Juan Carlos", "Ruiz-Soto", "Avenida de Lisboa 3", new Date(2001, 10, 2), "Masculino", "28500"),
    new Persona("Núria", "Garcia Ç", "Plaza España 1", new Date(1985, 0, 31), "Femenino", "08001")
];
var posicion = 0;          // índice de la persona que se está viendo
var modo = "consulta";     // ESTADO del programa: "consulta" | "alta" | "baja" | "modificacion"

// ids de las cajas y de los botones, agrupados para poder tratarlos en bloque
var CAJAS = ["nombre", "apellidos", "direccion", "fechaNacimiento", "genero", "codigoPostal"];
var BTN_NAVEGACION = ["btnPrimera", "btnAnterior", "btnSiguiente", "btnUltima"];
var BTN_ACCIONES = ["btnAlta", "btnBaja", "btnModificacion"];
var BTN_LISTADOS = ["btnListado", "btnMuestraUna"];
var BTN_CONFIRMAR = ["btnAceptar", "btnCancelar"];

/* ===================================================================
   2. GESTIÓN DE BOTONES Y CAJAS SEGÚN EL MODO  (la pieza clave)
   Regla: NUNCA se activa/desactiva un botón suelto desde otra función.
   Se cambia la variable "modo" y se llama a ajustarInterfaz(), que
   decide el estado de TODOS los botones a la vez.
   =================================================================== */
function activar(ids, valor) {                 // valor true = habilitados
    for (var id of ids) {
        document.getElementById(id).disabled = !valor;
    }
}
function ajustarInterfaz() {
    var hayDatos = personas.length > 0;
    var consulta = (modo == "consulta");
    var editando = (modo == "alta" || modo == "modificacion");   // se escribe en las cajas

    // Navegación: solo en consulta o baja (para elegir a quién borrar) y si hay datos
    activar(BTN_NAVEGACION, hayDatos && (consulta || modo == "baja"));
    // Alta siempre disponible en consulta; baja y modificación necesitan datos
    document.getElementById("btnAlta").disabled = !consulta;
    document.getElementById("btnBaja").disabled = !(consulta && hayDatos);
    document.getElementById("btnModificacion").disabled = !(consulta && hayDatos);
    // Listados: solo en consulta y con datos
    activar(BTN_LISTADOS, consulta && hayDatos);
    // Aceptar / Cancelar: solo cuando hay una acción pendiente
    activar(BTN_CONFIRMAR, !consulta);
    // Cajas: solo se pueden escribir al dar de alta o modificar
    for (var id of CAJAS) {
        document.getElementById(id).readOnly = !editando;
    }
}

/* ===================================================================
   3. PANTALLA
   =================================================================== */
function mostrar() {                           // vuelca la persona actual en las cajas
    if (personas.length == 0) {
        for (var id of CAJAS) document.getElementById(id).value = "";
        document.getElementById("info").innerHTML = "No hay personas dadas de alta.";
        return;
    }
    var p = personas[posicion];
    document.getElementById("nombre").value = p.nombre;
    document.getElementById("apellidos").value = p.apellidos;
    document.getElementById("direccion").value = p.direccion;
    document.getElementById("fechaNacimiento").value = p.fechaTexto();
    document.getElementById("genero").value = p.genero;
    document.getElementById("codigoPostal").value = p.codigoPostal;
    document.getElementById("info").innerHTML = p.tratamiento() + " " + p.nombre + " " + p.apellidos +
        ", " + p.edad() + " años. (Persona " + (posicion + 1) + " de " + personas.length + ")";
}
function mensaje(texto, color) {
    var div = document.getElementById("mensaje");
    div.style.color = color;
    div.innerHTML = texto;
}
function iniciar() {                           // se llama con <body onload="iniciar()">
    mostrar();
    ajustarInterfaz();
}

/* ===================================================================
   4. NAVEGACIÓN (circular)
   =================================================================== */
function primera() { posicion = 0; mostrar(); }
function ultima() { posicion = personas.length - 1; mostrar(); }
function siguiente() {
    posicion++;
    if (posicion >= personas.length) posicion = 0;
    mostrar();
}
function anterior() {
    posicion--;
    if (posicion < 0) posicion = personas.length - 1;
    mostrar();
}

/* ===================================================================
   5. VALIDACIONES  (cada una devuelve "" si está bien, o el texto del error)
   =================================================================== */
var LETRAS = "abcdefghijklmnñopqrstuvwxyzáéíóúüç";
var NUMEROS = "0123456789";

function soloCaracteres(texto, permitidos) {
    for (var i = 0; i < texto.length; i++) {
        if (permitidos.indexOf(texto.charAt(i)) == -1) return false;
    }
    return true;
}
// Valida longitud, espacios en los extremos y caracteres permitidos
function validarTexto(texto, campo, min, max, permitidos) {
    var e = "";
    if (texto.length < min || texto.length > max) e += campo + ": entre " + min + " y " + max + " caracteres. ";
    if (texto != texto.trim()) e += campo + ": sin espacios al principio ni al final. ";
    if (!soloCaracteres(texto.toLowerCase(), permitidos)) e += campo + ": contiene caracteres no permitidos. ";
    return e;
}
// Convierte "dd/mm/aaaa" en Date. Devuelve null si no es una fecha real
function convertirFecha(texto) {
    var p = texto.split("/");
    if (p.length != 3) return null;
    for (var x of p) if (x.length == 0 || !soloCaracteres(x, NUMEROS)) return null;
    var d = parseInt(p[0], 10), m = parseInt(p[1], 10), a = parseInt(p[2], 10);
    if (p[2].length != 4) return null;
    var f = new Date(a, m - 1, d);
    // si el día no coincide, es que la fecha no existe (ej. 31/02 pasa a marzo)
    if (f.getDate() != d || f.getMonth() != m - 1 || f.getFullYear() != a) return null;
    return f;
}
function validarFecha(texto) {
    var f = convertirFecha(texto);
    if (f == null) return "Fecha: formato dd/mm/aaaa y que exista. ";
    if (f >= new Date()) return "Fecha: debe ser anterior a la actual. ";
    return "";
}
function validarGenero(texto) {
    if (texto != "Masculino" && texto != "Femenino") return "Género: solo Masculino o Femenino. ";
    return "";
}
function validarCodigoPostal(texto) {
    if (texto.length != 5 || !soloCaracteres(texto, NUMEROS)) return "Código postal: 5 dígitos del 0 al 9. ";
    return "";
}
// Lee las cajas y devuelve todos los errores juntos
function validarFormulario() {
    var v = leerCajas();
    return validarTexto(v.nombre, "Nombre", 3, 20, LETRAS + " -") +
        validarTexto(v.apellidos, "Apellidos", 3, 30, LETRAS + " -") +
        validarTexto(v.direccion, "Dirección", 3, 35, LETRAS + NUMEROS + " -") +
        validarFecha(v.fechaNacimiento) +
        validarGenero(v.genero) +
        validarCodigoPostal(v.codigoPostal);
}
function leerCajas() {
    return {
        nombre: document.getElementById("nombre").value,
        apellidos: document.getElementById("apellidos").value,
        direccion: document.getElementById("direccion").value,
        fechaNacimiento: document.getElementById("fechaNacimiento").value,
        genero: document.getElementById("genero").value,
        codigoPostal: document.getElementById("codigoPostal").value
    };
}

/* ===================================================================
   6. ACCIONES: cada botón solo CAMBIA DE MODO. El trabajo real se hace en aceptar().
   =================================================================== */
function alta() {
    modo = "alta";
    for (var id of CAJAS) document.getElementById(id).value = "";     // cajas limpias
    document.getElementById("info").innerHTML = "ALTA: rellena los datos y pulsa Aceptar.";
    mensaje("", "red");
    ajustarInterfaz();
    document.getElementById("nombre").focus();                        // foco en la primera caja
}
function baja() {
    modo = "baja";
    mensaje("BAJA: navega hasta la persona y pulsa Aceptar para eliminarla.", "black");
    ajustarInterfaz();
}
function modificacion() {
    modo = "modificacion";
    mensaje("MODIFICACIÓN: cambia los datos y pulsa Aceptar.", "black");
    ajustarInterfaz();
    document.getElementById("nombre").focus();
}
function cancelar() {
    modo = "consulta";
    mensaje("Operación cancelada.", "black");
    mostrar();                         // restaura en las cajas lo que había
    ajustarInterfaz();
}
function aceptar() {
    if (modo == "alta" || modo == "modificacion") {
        var error = validarFormulario();
        if (error != "") {                       // hay errores: se muestran TODOS y se sigue en el mismo modo
            mensaje(error, "red");
            return;
        }
        if (!confirm("¿Confirma la operación?")) return;
        var v = leerCajas();
        var fecha = convertirFecha(v.fechaNacimiento);
        if (modo == "alta") {
            personas.push(new Persona(v.nombre, v.apellidos, v.direccion, fecha, v.genero, v.codigoPostal));
            posicion = personas.length - 1;
            mensaje("Persona dada de alta.", "green");
        } else {
            var p = personas[posicion];          // se modifica con los SETTERS
            p.nombre = v.nombre;
            p.apellidos = v.apellidos;
            p.direccion = v.direccion;
            p.fechaNacimiento = fecha;
            p.genero = v.genero;
            p.codigoPostal = v.codigoPostal;
            mensaje("Persona modificada.", "green");
        }
    } else if (modo == "baja") {
        if (!confirm("¿Seguro que desea eliminar a " + personas[posicion].nombre + "?")) return;
        personas.splice(posicion, 1);            // borra 1 elemento desde la posición actual
        if (posicion >= personas.length) posicion = personas.length - 1;
        mensaje("Persona dada de baja.", "green");
    } else {
        return;
    }
    modo = "consulta";                           // al terminar, SIEMPRE se vuelve a consulta
    mostrar();
    ajustarInterfaz();
}

/* ===================================================================
   7. LISTADOS
   =================================================================== */
function listado() { Persona.listarPersonas(personas); }          // método estático
function muestraUnaPersona() { personas[posicion].listarPersona(); }  // método de instancia
