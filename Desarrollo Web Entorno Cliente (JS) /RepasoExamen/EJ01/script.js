// Clase animal 
class Animal {
    constructor(nombre, especie, anioNacimiento, peso, chip) {
        this._nombre = nombre;
        this._especie = especie;
        this._anioNacimiento = parseInt(anioNacimiento);
        this._peso = parseFloat(peso).toFixed(2);
        this._chip = chip;
    }

    get nombre() {
        return this._nombre;
    }
    get especie() {
        return this._especie;
    }
    get anioNacimiento() {
        return this._anioNacimiento;
    }
    get peso() {
        return this._peso;
    }
    get chip() {
        return this._chip;
    }

    set nombre(nombre) {
        this._nombre = nombre;
    }
    set especie(especie) {
        this._especie = especie;
    }
    set anioNacimiento(anioNacimiento) {
        this._anioNacimiento = anioNacimiento;
    }
    set peso(peso) {
        this._peso = peso;
    }
    set chip(chip) {
        this._chip = chip;
    }

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
            tabla += '<tr><td>' + array[i].nombre + '</td>' + '<td>' + array[i].especie + '</td>' + '<td>' + array[i].categoria() + '</td>' + '<td>' + array[i].anioNacimiento + '</td>' + '<td>' + array[i].edad() + '</td>' + '<td>' + array[i].peso + '</td>' + '<td>' + array[i].chip + '</td></tr>';
        }
        tabla += '</table><br><input type="button" value="salir" onclick="window.close()">';
        ventana.document.write(tabla);
        ventana.document.close();
    }
}

// Funciones
var error = document.getElementById('error');
var animales = [new Animal('Polo', 'Perro', '2016', '18.4', '123443219'), new Animal('Arturo', 'Gato', '2022', '7.4', '123321123')];
var posicion = 0;
var modo = 'Consulta';

function validarNombre(nombre) {
    var caracteresPermitidos = [" ", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "ñ", "o", "p", "q", "r", "s", "t", "u", "v", "y", "w", "x", "W", "X", "Y", "z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "Ñ", "O", "P", "Q", "R", "S", "T", "U", "V", "Z", "á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú"];
    if (nombre.length < 3 || nombre.length > 15) {
        return error.innerHTML += 'Error: en la longitud del nombre. ';
    } else {
        for (var letraNombre = 0; letraNombre < nombre.length; letraNombre++) {
            if (!caracteresPermitidos.includes(nombre.charAt(letraNombre))) {
                return error.innerHTML += " ERROR: Caracteres no validos ";
            }
        }
    }
}

function validarEspecie(especie) {
    var especies = ['Perro', 'Gato', 'Conejo'];
    if (!especies.includes(especie)) {
        return error.innerHTML += 'ERROR: Especie no reconocida. ';
    }
}

function validarAnio(anioNacimiento) {
    var anioActual = new Date().getFullYear();

    if (isNaN(anioNacimiento) || anioNacimiento < 2000 || anioNacimiento > anioActual) {
        return error.innerHTML += 'ERROR: Error año de nacimiento. ';
    } else if (anioNacimiento.toString().length > 4) {
        return error.innerHTML += 'ERROR: longitud de año no valida. ';
    }
}

function validarPeso(peso) {
    if (isNaN(peso) || peso < 0.1 || peso > 100) {
        return error.innerHTML += 'ERROR: el peso no es valido';
    }
}

function validarChip(chip) {
    var caracteresValidos = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"]
    var errorChip = false;
    for (var i = 0; i < chip.toString().length; i++) {
        if (!caracteresValidos.includes(chip.toString().charAt(i))) {
            errorChip = true;
        }
    }
    if (chip.toString().length != 9 || errorChip) {
        return error.innerHTML += 'Longitud del chip invalida [9 cifras], o numero no valido';
    }
}

function validarDatos() {
    var nombre = document.getElementById('nombre').value;
    var especie = document.getElementById('especie').value;
    var anioNacimiento = parseInt(document.getElementById('anioNacimiento').value);
    var peso = parseFloat(document.getElementById('peso').value);
    var chip = document.getElementById('chip').value;
    error.innerHTML = "";
    validarNombre(nombre);
    validarEspecie(especie);
    validarAnio(anioNacimiento);
    validarPeso(peso);
    validarChip(chip);
}

function limpiarCajas() {
    document.getElementById('nombre').value = "";
    document.getElementById('especie').value = "";
    document.getElementById('anioNacimiento').value = "";
    document.getElementById('peso').value = "";
    document.getElementById('chip').value = "";
}

function listado(array) {
    if (animales.length == 0) {
        error.innerHTML = "ERROR: No hay animales para listar.";
    } else {
        document.getElementById('respuesta').value = "";
        Animal.listarAnimales(animales);
    }
}

function alta() {
    validarDatos();
    modo = 'Alta';
    var nombre = document.getElementById('nombre').value;
    var especie = document.getElementById('especie').value;
    var anioNacimiento = parseInt(document.getElementById('anioNacimiento').value);
    var peso = parseFloat(document.getElementById('peso').value);
    var chip = document.getElementById('chip').value;

    if (error.innerHTML == "") {
        if (confirm('¿Deseas agregar este animal?')) {
            animales.push(new Animal(nombre, especie, anioNacimiento, peso, chip));
            limpiarCajas();
            posicion = animales.length - 1;
            mostrar();
        } else {
            alert('No se agregaron los datos');
            error.innerHTML = "";
        }
    }
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

function baja() {
    modo = 'Baja';
    if (animales.length == 0) {
        error.innerHTML = "ERROR: No hay animales para borrar.";
        return;
    }
    if (confirm('¿Seguro que quieres borrar a ' + animales[posicion].nombre + '?')) {
        animales.splice(posicion, 1);
        if (posicion >= animales.length) posicion = animales.length - 1;
        if (posicion < 0) posicion = 0;
        mostrar();
    }
}

function modificar() {
    modo = 'Modificar';
    var a = animales[posicion];
    document.getElementById('nombre').value = a.nombre;
    document.getElementById('especie').value = a.especie;
    document.getElementById('anioNacimiento').value = a.anioNacimiento;
    document.getElementById('peso').value = a.peso;
    document.getElementById('chip').value = a.chip;
    document.getElementById('indice').innerHTML = (posicion + 1) + " de " + animales.length;
}
// Control de botones

function ajustarInterfaz() {
    if (modo == 'Consulta') {
        document.getElementById('btnPrimero').disabled = false;
        document.getElementById('btnAnterior').disabled = false;
        document.getElementById('btnSiguiente').disabled = false;
        document.getElementById('btnUltimo').disabled = false;
        document.getElementById('btnAlta').disabled = false;
        document.getElementById('btnBaja').disabled = false;
        document.getElementById('btnModificar').disabled = false;
        document.getElementById('btnListado').disabled = false;
        document.getElementById('btnAceptar').hidden = true;
        document.getElementById('btnCancelar').hidden = true;
    } else if (modo == "Modificar") {
        document.getElementById('btnPrimero').disabled = true;
        document.getElementById('btnAnterior').disabled = true;
        document.getElementById('btnSiguiente').disabled = true;
        document.getElementById('btnUltimo').disabled = true;
        document.getElementById('btnAlta').disabled = true;
        document.getElementById('btnBaja').disabled = true;
        document.getElementById('btnModificar').disabled = true;
        document.getElementById('btnListado').disabled = true;
        document.getElementById('btnAceptar').hidden = false;
        document.getElementById('btnCancelar').hidden = false;
    } else if (modo == 'Baja') {
        document.getElementById('btnPrimero').disabled = true;
        document.getElementById('btnAnterior').disabled = true;
        document.getElementById('btnSiguiente').disabled = true;
        document.getElementById('btnUltimo').disabled = true;
        document.getElementById('btnAlta').disabled = true;
        document.getElementById('btnBaja').disabled = true;
        document.getElementById('btnModificar').disabled = true;
        document.getElementById('btnListado').disabled = true;
        document.getElementById('btnAceptar').hidden = false;
        document.getElementById('btnCancelar').hidden = false;
    }
}


// navegacion

function primero() {
    modo = 'Consulta';
    posicion = 0; mostrar();
}

function ultimo() {
    modo = 'Consulta';
    posicion = animales.length - 1; mostrar();
}

function siguiente() {
    modo = 'Consulta';
    if (posicion < animales.length - 1) posicion++; mostrar();
}

function anterior() {
    modo = 'Consulta';
    if (posicion > 0) posicion--; mostrar();
}

mostrar()