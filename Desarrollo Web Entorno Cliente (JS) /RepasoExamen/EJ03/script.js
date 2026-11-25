// =====================================================================
// PLANTILLA ABM — ejemplo relleno con Moto. Para otro tema solo hay que tocar
// los bloques marcados con  >>> RELLENAR <<<   (el resto NO se toca)
// Requisito: los id de las cajas en el HTML = nombres de los getters de la clase.
// =====================================================================

// >>> RELLENAR 1: datos de ejemplo (new Clase(...) con los campos en el mismo orden que el constructor)
var datos = [new Moto('Suzuki', 'Ghost', '6767DGT', 2025, 225, 17000),
             new Moto('Honda', 'Vision 110', '1234BCD', 2022, 110, 2100),
             new Moto('Yamaha', 'MT-07', '5678FGH', 2021, 689, 7500),
             new Moto('Harley', 'Sportster', '1111BCD', 1995, 883, 6000)];

// >>> RELLENAR 2: cómo se crea un objeto a partir de la lista de valores ya validados
function crear(v) { return new Moto(v[0], v[1], v[2], v[3], v[4], v[5]); }

// >>> RELLENAR 3: qué listado se abre (método estático de la clase) y qué es "especial"
function abrirListado(lista) { Moto.listarMotos(lista); }
function esEspecial(obj) { return obj.esClasica(); }     // lo que filtra "listar clásicas"
var CLAVE = 'matricula';                                   // campo que no se repite y por el que se da de baja

// >>> RELLENAR 4: CAMPOS (un renglón por campo, en el orden del constructor)
//   tipo: 'texto' | 'entero' | 'decimal'
//   texto  -> min, max (longitud), permitidos (caracteres válidos)
//   entero -> min, max (valor), digitos (opcional: nº exacto de cifras)
//   decimal-> min, max (valor)
//   extra  -> (opcional) función que recibe el texto y devuelve un mensaje de error o "" si está bien
var LETRAS = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ ";
var DIGITOS = "0123456789";
var CONSONANTES = "BCDFGHJKLMNPRSTVWXYZ";
var ANIO_ACTUAL = new Date().getFullYear();

var CAMPOS = [
    { id: 'marca',           nombre: 'La marca',        tipo: 'texto',   min: 2,    max: 15,    permitidos: LETRAS },
    { id: 'modelo',          nombre: 'El modelo',       tipo: 'texto',   min: 1,    max: 20,    permitidos: LETRAS + DIGITOS + "-" },
    { id: 'matricula',       nombre: 'La matrícula',    tipo: 'texto',   min: 7,    max: 7,     permitidos: DIGITOS + CONSONANTES,
      extra: function (t) { return (soloCaracteres(t.substr(0, 4), DIGITOS) && soloCaracteres(t.substr(4, 3), CONSONANTES)) ? "" : "debe ser 4 cifras y 3 consonantes mayúsculas (1234BCD)"; } },
    { id: 'anioFabricacion', nombre: 'El año',          tipo: 'entero',  min: 1950, max: ANIO_ACTUAL, digitos: 4 },
    { id: 'cilindrada',      nombre: 'La cilindrada',   tipo: 'entero',  min: 49,   max: 2500 },
    { id: 'precio',          nombre: 'El precio',       tipo: 'decimal', min: 100,  max: 50000 }
];

// =====================================================================
// A PARTIR DE AQUÍ NO SE TOCA NADA (funciona con cualquier CAMPOS)
// =====================================================================
var posicion = 0;
var modo = 'Consulta';      // 'Consulta' | 'Alta' | 'Baja' | 'Modificar'

function soloCaracteres(texto, permitidos) {
    for (var i = 0; i < texto.length; i++) {
        if (permitidos.indexOf(texto.charAt(i)) == -1) return false;
    }
    return true;
}

function leerTexto(campo) { return document.getElementById(campo.id).value.trim(); }

// Devuelve "" si el campo es válido o el mensaje de error
function comprobar(campo) {
    var t = leerTexto(campo);
    if (campo.tipo == 'texto') {
        if (t.length < campo.min || t.length > campo.max) return "debe tener entre " + campo.min + " y " + campo.max + " caracteres";
        if (!soloCaracteres(t, campo.permitidos)) return "contiene caracteres no permitidos";
    } else {
        var permitidos = (campo.tipo == 'entero') ? DIGITOS : DIGITOS + ".";
        if (t == "" || !soloCaracteres(t, permitidos)) return (campo.tipo == 'entero') ? "debe ser un número entero" : "debe ser un número (con punto)";
        if (campo.digitos && t.length != campo.digitos) return "debe tener " + campo.digitos + " cifras";
        var n = Number(t);
        if (isNaN(n) || n < campo.min || n > campo.max) return "debe estar entre " + campo.min + " y " + campo.max;
    }
    if (campo.extra) return campo.extra(t);
    return "";
}

function valor(campo) {                    // el valor ya convertido al tipo correcto
    var t = leerTexto(campo);
    if (campo.tipo == 'entero') return parseInt(t);
    if (campo.tipo == 'decimal') return Number(t);
    return t;
}

function limpiarDivs() {
    for (var c of CAMPOS) document.getElementById('error_' + c.id).innerHTML = "";
    document.getElementById('respuesta').innerHTML = "";
}

function limpiarCajas() { for (var c of CAMPOS) document.getElementById(c.id).value = ""; }

// Valida TODOS los campos (muestra todos los errores a la vez). Devuelve true si todo está bien
function validarTodo() {
    var todoBien = true;
    for (var c of CAMPOS) {
        var msg = comprobar(c);
        if (msg != "") {
            document.getElementById('error_' + c.id).innerHTML = "Error: " + c.nombre + " " + msg;
            todoBien = false;
        }
    }
    return todoBien;
}

function buscarPorClave(clave) {
    for (var i = 0; i < datos.length; i++) {
        if (datos[i][CLAVE] == clave) return i;
    }
    return -1;
}

// ---------------- Parte 3 ----------------
function listado() {
    limpiarDivs();
    if (datos.length == 0) { document.getElementById('respuesta').innerHTML = "No hay datos para listar."; return; }
    abrirListado(datos);
}

function listarClasicas() {
    limpiarDivs();
    var especiales = [];
    for (var i = 0; i < datos.length; i++) if (esEspecial(datos[i])) especiales.push(datos[i]);
    if (especiales.length == 0) { document.getElementById('respuesta').innerHTML = "No hay elementos que cumplan la condición."; return; }
    abrirListado(especiales);
}

function bajaPorMatricula() {
    limpiarDivs();
    var clave = document.getElementById('matriculaBaja').value.trim();
    var respuesta = document.getElementById('respuesta');
    if (clave == "") { respuesta.innerHTML = "Error: escribe el valor a buscar"; return; }
    var i = buscarPorClave(clave);
    if (i == -1) { respuesta.innerHTML = "No existe ningún elemento con " + CLAVE + " " + clave; return; }
    if (confirm('¿Eliminar el elemento con ' + CLAVE + ' ' + clave + '?')) {
        datos.splice(i, 1);
        if (posicion >= datos.length) posicion = datos.length - 1;
        if (posicion < 0) posicion = 0;
        document.getElementById('matriculaBaja').value = "";
        respuesta.innerHTML = "Elemento eliminado";
        mostrar();
        ajustarInterfaz();
    }
}

// ---------------- Parte 4: ABM ----------------
var TODOS = ['btnPrimero', 'btnAnterior', 'btnSiguiente', 'btnUltimo', 'btnAlta', 'btnBaja', 'btnModificar',
             'btnListado', 'btnClasicas', 'btnBajaMat', 'matriculaBaja', 'btnAceptar', 'btnCancelar'];
var ACTIVOS = {
    'Consulta':  ['btnPrimero', 'btnAnterior', 'btnSiguiente', 'btnUltimo', 'btnAlta', 'btnBaja', 'btnModificar',
                  'btnListado', 'btnClasicas', 'btnBajaMat', 'matriculaBaja'],
    'Alta':      ['btnAceptar', 'btnCancelar'],
    'Modificar': ['btnAceptar', 'btnCancelar'],
    'Baja':      ['btnPrimero', 'btnAnterior', 'btnSiguiente', 'btnUltimo', 'btnAceptar', 'btnCancelar']
};

function ajustarInterfaz() {
    var activos = ACTIVOS[modo];
    if (datos.length == 0 && modo == 'Consulta') activos = ['btnAlta'];
    for (var id of TODOS) document.getElementById(id).disabled = !activos.includes(id);
    document.getElementById('btnAceptar').hidden = (modo == 'Consulta');
    document.getElementById('btnCancelar').hidden = (modo == 'Consulta');
    var editando = (modo == 'Alta' || modo == 'Modificar');
    for (var c of CAMPOS) document.getElementById(c.id).readOnly = !editando;
    if (modo == 'Modificar') document.getElementById(CLAVE).readOnly = true;   // la clave no se cambia
}

function mostrar() {
    if (datos.length == 0) {
        limpiarCajas();
        document.getElementById('contador').innerHTML = "0 de 0";
        return;
    }
    for (var c of CAMPOS) document.getElementById(c.id).value = datos[posicion][c.id];
    document.getElementById('contador').innerHTML = (posicion + 1) + " de " + datos.length;
}

function primero()   { posicion = 0; mostrar(); }
function ultimo()    { posicion = datos.length - 1; mostrar(); }
function anterior()  { if (posicion > 0) posicion--; mostrar(); }
function siguiente() { if (posicion < datos.length - 1) posicion++; mostrar(); }

function iniciarAlta()      { limpiarDivs(); limpiarCajas(); modo = 'Alta'; ajustarInterfaz(); }
function iniciarBaja()      { limpiarDivs(); modo = 'Baja'; ajustarInterfaz(); }
function iniciarModificar() { limpiarDivs(); modo = 'Modificar'; ajustarInterfaz(); }
function cancelar()         { limpiarDivs(); modo = 'Consulta'; mostrar(); ajustarInterfaz(); }

function aceptar() {
    limpiarDivs();
    var respuesta = document.getElementById('respuesta');

    if (modo == 'Alta' || modo == 'Modificar') {
        if (!validarTodo()) return;
        var valores = [];
        for (var c of CAMPOS) valores.push(valor(c));

        if (modo == 'Alta') {
            var clave = leerTexto({ id: CLAVE });
            if (buscarPorClave(clave) != -1) {
                document.getElementById('error_' + CLAVE).innerHTML = "Error: " + CLAVE + " ya existe";
                return;
            }
            if (!confirm('¿Confirmar el alta?')) return;
            datos.push(crear(valores));
            posicion = datos.length - 1;
            respuesta.innerHTML = "Alta realizada";
        } else {
            if (!confirm('¿Guardar los cambios?')) return;
            for (var i = 0; i < CAMPOS.length; i++) {
                if (CAMPOS[i].id != CLAVE) datos[posicion][CAMPOS[i].id] = valores[i];   // usa los setters
            }
            respuesta.innerHTML = "Modificación realizada";
        }
    } else if (modo == 'Baja') {
        if (!confirm('¿Eliminar el elemento mostrado?')) return;
        datos.splice(posicion, 1);
        if (posicion >= datos.length) posicion = datos.length - 1;
        if (posicion < 0) posicion = 0;
        respuesta.innerHTML = "Baja realizada";
    }
    modo = 'Consulta';
    mostrar();
    ajustarInterfaz();
}

mostrar();
ajustarInterfaz();
