// =====================================================================
// EJ01 - Clínica veterinaria (completo)
// Basado en tu código: he mantenido tus nombres (animales, posicion, modo,
// error, mostrar, limpiarCajas, validarX...) y he añadido lo que faltaba.
// Lo añadido/cambiado lleva el comentario  // NUEVO  o  // CAMBIO
// =====================================================================

// ------------------------------ CLASE ------------------------------
class Animal {
    constructor(nombre, especie, anioNacimiento, peso, chip) {
        this._nombre = nombre;
        this._especie = especie;
        this._anioNacimiento = parseInt(anioNacimiento);
        this._peso = parseFloat(peso);                 // CAMBIO: número (toFixed solo al mostrar)
        this._chip = chip;                             // texto: así no se pierden los ceros
    }

    get nombre() { return this._nombre; }
    get especie() { return this._especie; }
    get anioNacimiento() { return this._anioNacimiento; }
    get peso() { return this._peso; }
    get chip() { return this._chip; }

    set nombre(nombre) { this._nombre = nombre; }
    set especie(especie) { this._especie = especie; }
    set anioNacimiento(anioNacimiento) { this._anioNacimiento = parseInt(anioNacimiento); }   // CAMBIO: parseInt
    set peso(peso) { this._peso = parseFloat(peso); }                                         // CAMBIO: parseFloat
    set chip(chip) { this._chip = chip; }

    edad() {
        return new Date().getFullYear() - this._anioNacimiento;
    }

    categoria() {
        var edad = this.edad();
        if (edad < 2) {
            return 'Cachorro';
        } else if (edad <= 9) {
            return 'Adulto';
        } else {
            return 'Senior';
        }
    }

    static listarAnimales(array) {
        var ventana = window.open("", "", "width=800,height=400");
        var tabla = '<table border=1><tr><th>Nombre</th><th>Especie</th><th>Categoria</th><th>Año Nacimiento</th><th>Edad</th><th>Peso</th><th>Chip</th></tr>';
        for (var i = 0; i < array.length; i++) {
            // NUEVO: los Senior se pintan en rojo
            var color = (array[i].categoria() == 'Senior') ? 'red' : 'black';
            tabla += '<tr style="color:' + color + '">' +
                '<td>' + array[i].nombre + '</td>' +
                '<td>' + array[i].especie + '</td>' +
                '<td>' + array[i].categoria() + '</td>' +
                '<td>' + array[i].anioNacimiento + '</td>' +
                '<td>' + array[i].edad() + '</td>' +
                '<td>' + array[i].peso.toFixed(2) + '</td>' +      // CAMBIO: toFixed al mostrar
                '<td>' + array[i].chip + '</td></tr>';
        }
        tabla += '</table>';
        tabla += '<br><button onclick="window.close()">Cerrar</button>';   // NUEVO: botón Cerrar
        ventana.document.write(tabla);
        ventana.document.close();
    }
}

// ------------------------- VARIABLES GLOBALES -------------------------
var error = document.getElementById('error');
// Datos de prueba (bórralos para el examen: empieza con var animales = [];)
var animales = [new Animal('Polo', 'Perro', '2016', '18.4', '123443219'),
                new Animal('Arturo', 'Gato', '2022', '7.4', '123321123')];
var posicion = 0;
var modo = 'Consulta';                                  // 'Consulta' | 'Alta' | 'Baja' | 'Modificar'

var CAJAS = ['nombre', 'especie', 'anioNacimiento', 'peso', 'chip'];                      // NUEVO
var BTN_NAV = ['btnPrimero', 'btnAnterior', 'btnSiguiente', 'btnUltimo'];                 // NUEVO

// ------------------------------ VALIDACIONES ------------------------------
function soloCifras(texto) {                            // NUEVO: ayuda para año y chip
    var cifras = "0123456789";
    for (var i = 0; i < texto.length; i++) {
        if (cifras.indexOf(texto.charAt(i)) == -1) return false;
    }
    return true;
}

function validarNombre(nombre) {
    var caracteresPermitidos = [" ", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "ñ", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
        "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "Ñ", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z",
        "á", "é", "í", "ó", "ú", "ü", "Á", "É", "Í", "Ó", "Ú", "Ü"];
    if (nombre.length < 3 || nombre.length > 15) {
        error.innerHTML += 'ERROR: el nombre debe tener entre 3 y 15 caracteres. ';
    }
    for (var i = 0; i < nombre.length; i++) {           // CAMBIO: se comprueba siempre, para acumular los dos errores
        if (!caracteresPermitidos.includes(nombre.charAt(i))) {
            error.innerHTML += 'ERROR: el nombre solo admite letras y espacios. ';
            break;
        }
    }
}

function validarEspecie(especie) {
    var especies = ['Perro', 'Gato', 'Conejo'];
    if (!especies.includes(especie)) {
        error.innerHTML += 'ERROR: especie no reconocida (Perro, Gato o Conejo). ';
    }
}

function validarAnio(texto) {                           // CAMBIO: recibe el texto de la caja
    var anioActual = new Date().getFullYear();
    if (texto.length != 4 || !soloCifras(texto)) {
        error.innerHTML += 'ERROR: el año debe tener 4 cifras. ';
    } else if (parseInt(texto) < 2000 || parseInt(texto) > anioActual) {
        error.innerHTML += 'ERROR: el año debe estar entre 2000 y ' + anioActual + '. ';
    }
}

function validarPeso(texto) {                           // CAMBIO: recibe el texto de la caja
    var peso = Number(texto);                           // Number("12.5abc") da NaN (parseFloat lo dejaría pasar)
    if (texto == "" || isNaN(peso) || peso < 0.1 || peso > 100) {
        error.innerHTML += 'ERROR: el peso debe ser un número entre 0.1 y 100 (con punto). ';
    }
}

function validarChip(chip) {
    if (chip.length != 9 || !soloCifras(chip)) {
        error.innerHTML += 'ERROR: el chip debe tener exactamente 9 cifras. ';
    }
}

function validarDatos() {
    error.innerHTML = "";
    validarNombre(document.getElementById('nombre').value.trim());
    validarEspecie(document.getElementById('especie').value.trim());
    validarAnio(document.getElementById('anioNacimiento').value.trim());
    validarPeso(document.getElementById('peso').value.trim());
    validarChip(document.getElementById('chip').value.trim());
}

// ------------------------------ UTILIDADES ------------------------------
function limpiarCajas() {
    for (var id of CAJAS) document.getElementById(id).value = "";
}

function mostrar() {
    if (animales.length == 0) {
        limpiarCajas();
        document.getElementById('indice').innerHTML = "";
        return;
    }
    var a = animales[posicion];
    document.getElementById('nombre').value = a.nombre;
    document.getElementById('especie').value = a.especie;
    document.getElementById('anioNacimiento').value = a.anioNacimiento;
    document.getElementById('peso').value = a.peso;
    document.getElementById('chip').value = a.chip;
    document.getElementById('indice').innerHTML = (posicion + 1) + " de " + animales.length;
}

// ------------------------- CONTROL DE BOTONES (NUEVO) -------------------------
function activar(ids, estado) {                         // activa (true) o desactiva (false) varios botones
    for (var id of ids) document.getElementById(id).disabled = !estado;
}

function ajustarInterfaz() {
    var hayDatos = animales.length > 0;
    var consulta = (modo == 'Consulta');
    var editando = (modo == 'Alta' || modo == 'Modificar');

    activar(BTN_NAV, hayDatos && (consulta || modo == 'Baja'));      // navegar: en consulta y en baja
    document.getElementById('btnAlta').disabled = !consulta;
    document.getElementById('btnBaja').disabled = !(consulta && hayDatos);
    document.getElementById('btnModificar').disabled = !(consulta && hayDatos);
    document.getElementById('btnListado').disabled = !(consulta && hayDatos);
    document.getElementById('btnAceptar').hidden = consulta;         // solo se ven cuando hay una operación en marcha
    document.getElementById('btnCancelar').hidden = consulta;
    for (var id of CAJAS) document.getElementById(id).readOnly = !editando;   // cajas editables solo en alta/modificar
}

// ------------------------- BOTONES DE ACCIÓN -------------------------
// Alta, Baja y Modificar SOLO cambian el modo y preparan la pantalla.
// El trabajo real lo hace aceptar().
function alta() {
    modo = 'Alta';
    limpiarCajas();
    error.innerHTML = "";
    document.getElementById('nombre').focus();
    ajustarInterfaz();
}

function baja() {
    if (animales.length == 0) {                         // comprobación por seguridad
        error.innerHTML = "ERROR: No hay animales para borrar.";
        return;
    }
    modo = 'Baja';
    error.innerHTML = "";
    ajustarInterfaz();
}

function modificar() {
    if (animales.length == 0) {
        error.innerHTML = "ERROR: No hay animales para modificar.";
        return;
    }
    modo = 'Modificar';
    error.innerHTML = "";
    ajustarInterfaz();                                  // las cajas ya muestran el animal actual
}

function cancelar() {
    modo = 'Consulta';
    error.innerHTML = "";
    mostrar();                                          // repone lo guardado: se descarta lo escrito
    ajustarInterfaz();
}

function aceptar() {
    if (modo == 'Alta' || modo == 'Modificar') {
        validarDatos();
        if (error.innerHTML != "") return;              // hay errores: te quedas en el modo para corregirlos
        if (!confirm('¿Confirmas la operación?')) return;

        var nombre = document.getElementById('nombre').value.trim();
        var especie = document.getElementById('especie').value.trim();
        var anio = parseInt(document.getElementById('anioNacimiento').value.trim());
        var peso = Number(document.getElementById('peso').value.trim());
        var chip = document.getElementById('chip').value.trim();

        if (modo == 'Alta') {
            animales.push(new Animal(nombre, especie, anio, peso, chip));
            posicion = animales.length - 1;             // te colocas en el nuevo
        } else {                                        // Modificar: se actualiza el animal actual con los setters
            var a = animales[posicion];
            a.nombre = nombre;
            a.especie = especie;
            a.anioNacimiento = anio;
            a.peso = peso;
            a.chip = chip;
        }
    } else if (modo == 'Baja') {
        if (!confirm('¿Seguro que quieres borrar a ' + animales[posicion].nombre + '?')) return;
        animales.splice(posicion, 1);
        if (posicion >= animales.length) posicion = animales.length - 1;   // no salirte del array
        if (posicion < 0) posicion = 0;                                    // por si no queda ninguno
    }

    modo = 'Consulta';                                  // al terminar, SIEMPRE se vuelve a consulta
    mostrar();
    ajustarInterfaz();
}

function listado() {
    error.innerHTML = "";
    if (animales.length == 0) {
        error.innerHTML = "ERROR: No hay animales para listar.";
    } else {
        Animal.listarAnimales(animales);
    }
}

// ------------------------- NAVEGACIÓN -------------------------
// (CAMBIO: ya no tocan 'modo'; los botones están desactivados cuando no deben usarse)
function primero() { posicion = 0; mostrar(); }
function ultimo() { posicion = animales.length - 1; mostrar(); }
function siguiente() { if (posicion < animales.length - 1) posicion++; mostrar(); }
function anterior() { if (posicion > 0) posicion--; mostrar(); }

// ------------------------- ARRANQUE -------------------------
mostrar();
ajustarInterfaz();
