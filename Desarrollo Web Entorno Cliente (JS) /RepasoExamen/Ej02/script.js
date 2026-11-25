// Parte 2. Validaciones + alta
// Marcado: // CAMBIO = corregido sobre tu código · // NUEVO = añadido
//
// Los 3 fallos de fondo que había (y que se repetían en todas las funciones):
//   1) leer la CAJA en vez de su valor:   getElementById('x').trim()  ->  getElementById('x').value.trim()
//   2) comparar con indexOf(i) (devuelve un número) en vez de charAt(i) (devuelve la letra)
//   3) llamar mal a las funciones: validarAnio sin () nunca se ejecuta

var motos = [new Moto('Suzuki', 'Ghost', '6767DGT', 2025, 225, 17000), new Moto('Honda', 'Vision 110', '1234BCD', 2022, 110, 2100), new Moto('Yamaha', 'MT-07', '5678FGH', 2021, 689, 7500), new Moto('Harley', 'Sportster', '1111BCD', 1995, 883, 6000)];
var posicion = 0;           // moto que se está viendo
var modo = 'Consulta';      // 'Consulta' | 'Alta' | 'Baja' | 'Modificar'

// NUEVO: textos de caracteres permitidos y una función que los comprueba uno a uno
var LETRAS = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ ";
var DIGITOS = "0123456789";
var CONSONANTES = "BCDFGHJKLMNPRSTVWXYZ";         // mayúsculas, sin vocales ni Ñ ni Q

function soloCaracteres(texto, permitidos) {
    for (var i = 0; i < texto.length; i++) {
        if (permitidos.indexOf(texto.charAt(i)) == -1) return false;    // indexOf = -1 -> no está
    }
    return true;
}

function validarMarca() {
    var error = document.getElementById('errorMarca');
    var marca = document.getElementById('marca').value.trim();           // CAMBIO: .value
    if (marca.length < 2 || marca.length > 15) {                          // CAMBIO: antes estaba al revés
        error.innerHTML = "Error: la marca debe tener entre 2 y 15 caracteres";
        return false;
    }
    if (!soloCaracteres(marca, LETRAS)) {                                 // CAMBIO: comprobación carácter a carácter
        error.innerHTML = "Error: la marca solo admite letras y espacios";
        return false;
    }
    return true;
}

function validarModelo() {
    var error = document.getElementById('errorModelo');
    var modelo = document.getElementById('modelo').value.trim();
    if (modelo.length < 1 || modelo.length > 20) {
        error.innerHTML = "Error: el modelo debe tener entre 1 y 20 caracteres";
        return false;
    }
    if (!soloCaracteres(modelo, LETRAS + DIGITOS + "-")) {                // CAMBIO: ahora admite mayúsculas
        error.innerHTML = "Error: el modelo solo admite letras, números, espacios y guion";
        return false;
    }
    return true;
}

function validarMatricula() {
    var error = document.getElementById('errorMatricula');
    var matricula = document.getElementById('matricula').value.trim();
    // CAMBIO: tu lista numerica tenía números y charAt devuelve texto ("1" no es 1), nunca acertaba
    if (matricula.length != 7 || !soloCaracteres(matricula.substr(0, 4), DIGITOS) || !soloCaracteres(matricula.substr(4, 3), CONSONANTES)) {
        error.innerHTML = "Error: formato 1234BCD (4 cifras y 3 consonantes mayúsculas)";
        return false;
    }
    return true;
}

function validarAnio() {
    var error = document.getElementById('errorAnio');
    var texto = document.getElementById('anioFabricacion').value.trim();
    var anio = parseInt(texto);
    // CAMBIO: comprueba que son 4 cifras (parseInt("20ab") daría 20) y devuelve false en el error
    if (texto.length != 4 || !soloCaracteres(texto, DIGITOS) || anio < 1950 || anio > new Date().getFullYear()) {
        error.innerHTML = "Error: el año debe tener 4 cifras y estar entre 1950 y " + new Date().getFullYear();
        return false;
    }
    return true;
}

function validarCilindrada() {
    var error = document.getElementById('errorCilindrada');
    var texto = document.getElementById('cilindrada').value.trim();
    var cilindrada = Number(texto);                                       // CAMBIO: Number("12abc") es NaN; parseInt lo dejaría pasar
    // CAMBIO: solo cifras (Number("1e2") sería 100 y se colaría)
    if (texto == "" || !soloCaracteres(texto, DIGITOS) || cilindrada < 49 || cilindrada > 2500) {
        error.innerHTML = "Error: la cilindrada debe ser un entero entre 49 y 2500";
        return false;
    }
    return true;
}

function validarPrecio() {
    var error = document.getElementById('errorPrecio');
    var texto = document.getElementById('precio').value.trim();
    var precio = Number(texto);
    // CAMBIO: solo cifras y punto, y isNaN (NaN < 100 es falso y se colaba)
    if (texto == "" || !soloCaracteres(texto, DIGITOS + ".") || isNaN(precio) || precio < 100 || precio > 50000) {
        error.innerHTML = "Error: el precio debe ser un número entre 100 y 50000 (con punto)";
        return false;
    }
    return true;
}

function limpiarDivs() {
    document.getElementById('errorMarca').innerHTML = "";
    document.getElementById('errorModelo').innerHTML = "";
    document.getElementById('errorMatricula').innerHTML = "";
    document.getElementById('errorAnio').innerHTML = "";
    document.getElementById('errorCilindrada').innerHTML = "";
    document.getElementById('errorPrecio').innerHTML = "";
    document.getElementById('respuesta').innerHTML = "";
}

// NUEVO: vacía las cajas tras un alta correcta
function limpiarCajas() {
    var ids = ['marca', 'modelo', 'matricula', 'anioFabricacion', 'cilindrada', 'precio'];
    for (var id of ids) document.getElementById(id).value = "";
}

function altaSimple() {   // Parte 2 pura: botón 'alta' sin modos. En el ABM se usa aceptar()
    limpiarDivs();
    // CAMBIO: se ejecutan TODAS (con paréntesis) y cada resultado se guarda, así salen todos los errores a la vez
    var v1 = validarMarca();
    var v2 = validarModelo();
    var v3 = validarMatricula();
    var v4 = validarAnio();
    var v5 = validarCilindrada();
    var v6 = validarPrecio();
    if (!(v1 && v2 && v3 && v4 && v5 && v6)) {
        return;                                    // los errores ya se ven debajo de cada caja
    }

    var marca = document.getElementById('marca').value.trim();           // CAMBIO: .value
    var modelo = document.getElementById('modelo').value.trim();
    var matricula = document.getElementById('matricula').value.trim();
    var anio = parseInt(document.getElementById('anioFabricacion').value.trim());
    var cilindrada = parseInt(document.getElementById('cilindrada').value.trim());
    var precio = Number(document.getElementById('precio').value.trim());
    var respuesta = document.getElementById('respuesta');

    // NUEVO: la matrícula no puede repetirse
    for (var i = 0; i < motos.length; i++) {
        if (motos[i].matricula == matricula) {
            document.getElementById('errorMatricula').innerHTML = "Error: esa matrícula ya existe";
            return;
        }
    }

    if (confirm('¿Estás seguro de que quieres agregar ' + marca + ' ' + modelo + ' al array?')) {   // CAMBIO: faltaba un espacio
        motos.push(new Moto(marca, modelo, matricula, anio, cilindrada, precio));   // CAMBIO: push de UN objeto Moto, no de 6 valores sueltos
        respuesta.innerHTML = 'Agregado con éxito';
        limpiarCajas();
    }
}

// ============================================================
// PARTE 3: listados y baja por matrícula
// ============================================================
function listado() {
    limpiarDivs();
    if (motos.length == 0) {
        document.getElementById('respuesta').innerHTML = "No hay motos para listar.";
    } else {
        Moto.listarMotos(motos);
    }
}

function listarClasicas() {
    limpiarDivs();
    var clasicas = [];
    for (var i = 0; i < motos.length; i++) {
        if (motos[i].esClasica()) clasicas.push(motos[i]);
    }
    if (clasicas.length == 0) {
        document.getElementById('respuesta').innerHTML = "No hay motos clásicas.";
    } else {
        Moto.listarMotos(clasicas);
    }
}

function bajaPorMatricula() {
    limpiarDivs();
    var matricula = document.getElementById('matriculaBaja').value.trim();
    var respuesta = document.getElementById('respuesta');
    if (matricula == "") {
        respuesta.innerHTML = "Error: escribe la matrícula a eliminar";
        return;
    }
    var encontrada = -1;
    for (var i = 0; i < motos.length; i++) {
        if (motos[i].matricula == matricula) encontrada = i;
    }
    if (encontrada == -1) {
        respuesta.innerHTML = "No existe ninguna moto con la matrícula " + matricula;
        return;
    }
    if (confirm('¿Eliminar la moto ' + motos[encontrada].marca + ' ' + motos[encontrada].modelo + ' (' + matricula + ')?')) {
        motos.splice(encontrada, 1);
        if (posicion >= motos.length) posicion = motos.length - 1;
        if (posicion < 0) posicion = 0;
        document.getElementById('matriculaBaja').value = "";
        respuesta.innerHTML = "Moto eliminada";
        mostrar();
        ajustarInterfaz();
    }
}

// ============================================================
// PARTE 4: ABM con navegador (modos) + ajustarInterfaz
// ============================================================
var CAJAS = ['marca', 'modelo', 'matricula', 'anioFabricacion', 'cilindrada', 'precio'];
var NAV = ['btnPrimero', 'btnAnterior', 'btnSiguiente', 'btnUltimo'];
var TODOS = ['btnPrimero', 'btnAnterior', 'btnSiguiente', 'btnUltimo', 'btnAlta', 'btnBaja', 'btnModificar',
             'btnListado', 'btnClasicas', 'btnBajaMat', 'matriculaBaja', 'btnAceptar', 'btnCancelar'];

// TABLA: qué elementos están ACTIVOS en cada modo (todo lo demás se desactiva solo)
var ACTIVOS = {
    'Consulta':  ['btnPrimero', 'btnAnterior', 'btnSiguiente', 'btnUltimo', 'btnAlta', 'btnBaja', 'btnModificar',
                  'btnListado', 'btnClasicas', 'btnBajaMat', 'matriculaBaja'],
    'Alta':      ['btnAceptar', 'btnCancelar'],
    'Modificar': ['btnAceptar', 'btnCancelar'],
    'Baja':      ['btnPrimero', 'btnAnterior', 'btnSiguiente', 'btnUltimo', 'btnAceptar', 'btnCancelar']
};

// La ÚNICA función que decide el estado de la pantalla. Se llama al final de todo lo que cambie 'modo'.
function ajustarInterfaz() {
    var activos = ACTIVOS[modo];
    if (motos.length == 0 && modo == 'Consulta') activos = ['btnAlta'];     // array vacío: solo se puede dar de alta
    for (var id of TODOS) {
        document.getElementById(id).disabled = !activos.includes(id);
    }
    // aceptar / cancelar: solo se ven cuando NO estamos en Consulta
    document.getElementById('btnAceptar').hidden = (modo == 'Consulta');
    document.getElementById('btnCancelar').hidden = (modo == 'Consulta');
    // cajas: se pueden escribir solo en Alta y Modificar (la matrícula es la clave: no se cambia al modificar)
    var editando = (modo == 'Alta' || modo == 'Modificar');
    for (var id of CAJAS) document.getElementById(id).readOnly = !editando;
    if (modo == 'Modificar') document.getElementById('matricula').readOnly = true;
}

// Pinta la moto actual en las cajas y el "n de total"
function mostrar() {
    if (motos.length == 0) {
        for (var id of CAJAS) document.getElementById(id).value = "";
        document.getElementById('contador').innerHTML = "0 de 0";
        return;
    }
    var m = motos[posicion];
    document.getElementById('marca').value = m.marca;
    document.getElementById('modelo').value = m.modelo;
    document.getElementById('matricula').value = m.matricula;
    document.getElementById('anioFabricacion').value = m.anioFabricacion;
    document.getElementById('cilindrada').value = m.cilindrada;
    document.getElementById('precio').value = m.precio;
    document.getElementById('contador').innerHTML = (posicion + 1) + " de " + motos.length;
}

// ---- navegación ----
function primero()   { posicion = 0; mostrar(); }
function ultimo()    { posicion = motos.length - 1; mostrar(); }
function anterior()  { if (posicion > 0) posicion--; mostrar(); }
function siguiente() { if (posicion < motos.length - 1) posicion++; mostrar(); }

// ---- los 3 botones de operación SOLO cambian el modo ----
function iniciarAlta() {
    limpiarDivs();
    for (var id of CAJAS) document.getElementById(id).value = "";
    modo = 'Alta';
    ajustarInterfaz();
}
function iniciarBaja() {
    limpiarDivs();
    modo = 'Baja';
    ajustarInterfaz();
}
function iniciarModificar() {
    limpiarDivs();
    modo = 'Modificar';
    ajustarInterfaz();
}

function cancelar() {
    limpiarDivs();
    modo = 'Consulta';
    mostrar();                 // vuelve a pintar la moto (descarta lo escrito)
    ajustarInterfaz();
}

// Aceptar: valida -> confirma -> ejecuta según el modo -> vuelve a Consulta
function aceptar() {
    limpiarDivs();
    var respuesta = document.getElementById('respuesta');

    if (modo == 'Alta' || modo == 'Modificar') {
        var v1 = validarMarca();
        var v2 = validarModelo();
        var v3 = validarMatricula();
        var v4 = validarAnio();
        var v5 = validarCilindrada();
        var v6 = validarPrecio();
        if (!(v1 && v2 && v3 && v4 && v5 && v6)) return;      // se queda en el mismo modo con los errores a la vista

        var marca = document.getElementById('marca').value.trim();
        var modelo = document.getElementById('modelo').value.trim();
        var matricula = document.getElementById('matricula').value.trim();
        var anio = parseInt(document.getElementById('anioFabricacion').value.trim());
        var cilindrada = parseInt(document.getElementById('cilindrada').value.trim());
        var precio = Number(document.getElementById('precio').value.trim());

        if (modo == 'Alta') {
            for (var i = 0; i < motos.length; i++) {
                if (motos[i].matricula == matricula) {
                    document.getElementById('errorMatricula').innerHTML = "Error: esa matrícula ya existe";
                    return;
                }
            }
            if (!confirm('¿Dar de alta ' + marca + ' ' + modelo + '?')) return;
            motos.push(new Moto(marca, modelo, matricula, anio, cilindrada, precio));
            posicion = motos.length - 1;                      // nos colocamos en la nueva
            respuesta.innerHTML = "Moto dada de alta";
        } else {   // Modificar: se cambian los datos con los setters (la matrícula no se toca)
            if (!confirm('¿Guardar los cambios de ' + matricula + '?')) return;
            var moto = motos[posicion];
            moto.marca = marca;
            moto.modelo = modelo;
            moto.anioFabricacion = anio;
            moto.cilindrada = cilindrada;
            moto.precio = precio;
            respuesta.innerHTML = "Moto modificada";
        }
    } else if (modo == 'Baja') {
        var actual = motos[posicion];
        if (!confirm('¿Eliminar ' + actual.marca + ' ' + actual.modelo + ' (' + actual.matricula + ')?')) return;
        motos.splice(posicion, 1);
        if (posicion >= motos.length) posicion = motos.length - 1;   // si borré la última, retrocedo
        if (posicion < 0) posicion = 0;                              // si no queda ninguna
        respuesta.innerHTML = "Moto eliminada";
    }

    modo = 'Consulta';
    mostrar();
    ajustarInterfaz();
}

// Al cargar la página (el script está al final del body, así que los elementos ya existen)
mostrar();
ajustarInterfaz();
