<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function usarAJAX() {
            var valorFiltro = document.getElementById("inputFiltro").value;
            var filtro = document.getElementById("valorAfiltrar").value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("outputPHP").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET', 'servidor.php?inputFiltro=' + valorFiltro + '&' + 'filtro=' + filtro, true);
            xmlhttp.send();
        }
    </script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="cuerpo">
        <h1>Lista empleados</h1>
        <input type="button" onclick="usarAJAX()" value="Filtrar por">
        <div id="interaccion">
            <select id="valorAfiltrar">
                <option value="nombre" selected>Nombre</option>
                <option value="apellido">Apellido</option>
                <option value="telefono">Teléfono</option>
            </select>
        </div>
        <input type="text" id="inputFiltro" placeholder="caracteres a filtrar">
        <div id="outputPHP"></div>
    </div>
</body>

</html>