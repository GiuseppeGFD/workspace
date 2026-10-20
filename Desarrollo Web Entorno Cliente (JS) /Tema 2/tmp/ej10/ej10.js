function validar() {
    // 1. Sacamos los datos (ambos como texto primero para revisar sus caracteres)
    var nombre = document.getElementById("nombre").value;
    var edadTexto = document.getElementById("edad").value;
    var comprobacionName = document.getElementById("divNombre");
    var comprobacionEdad = document.getElementById("divEdad");

    // Listas de caracteres permitidos 
    const letrasPermitidas = [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
        'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
        'á', 'é', 'í', 'ó', 'ú', 'ü', 'ç',
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
        'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
        'Á', 'É', 'Í', 'Ó', 'Ú', 'Ü', 'Ç', ' '
    ];
    const numerosPermitidos = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    // --- COMPROBAR EL NOMBRE ---
    var erroresNombre = [];
    for (let i = 0; i < nombre.length; i++) {
        if (!letrasPermitidas.includes(nombre[i])) {
            //para acordarme: (en java se usa add pero aqui es push)
            erroresNombre.push(i + 1); // Guardamos la posición (empezando en 1)
        }
    }

    if (erroresNombre.length > 0) {
        comprobacionName.innerHTML = "<p style='color: red;'>Hay un error en el carácter o caracteres número " + erroresNombre.join(", ") + " del texto</p>";
    } else if (nombre.length < 3 || nombre.length > 25) {
        comprobacionName.innerHTML = "<p style='color: red;'>El nombre debe tener entre 3 y 25 caracteres</p>";
    } else {
        comprobacionName.innerHTML = "<p style='color: blue;'>El nombre es correcto</p>";
    }

    // --- COMPROBAR LA EDAD ---
    var erroresEdad = [];
    for (let i = 0; i < edadTexto.length; i++) {
        if (!numerosPermitidos.includes(edadTexto[i])) {
            erroresEdad.push(i + 1); // Guardamos la posición si meten letras o símbolos
        }
    }

    if (edadTexto.length === 0) {
        comprobacionEdad.innerHTML = "<p style='color: red;'>Debes introducir una edad</p>";
    } else if (erroresEdad.length > 0) {
        comprobacionEdad.innerHTML = "<p style='color: red;'>Hay un error en el carácter o caracteres número " + erroresEdad.join(", ") + " del texto</p>";
    } else {
        var edadNumero = parseInt(edadTexto);
        if (edadNumero < 5 || edadNumero > 110) {
            comprobacionEdad.innerHTML = "<p style='color: red;'>La edad debe estar entre 5 y 110 años</p>";
        } else {
            comprobacionEdad.innerHTML = "<p style='color: blue;'>La edad es correcta</p>";
        }
    }
}

// Función para el botón Limpiar
function limpiar() {
    document.getElementById("nombre").value = "";
    document.getElementById("edad").value = "";
    document.getElementById("divNombre").innerHTML = "";
    document.getElementById("divEdad").innerHTML = "";
}