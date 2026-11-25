<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial</title>
    <script>
        function usarAJAX(accion) {
            var verbo = document.getElementById("inputVerbo").value;
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("respuestaAjax").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open('POST', 'servidor.php', true);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlhttp.send('verbo=' + verbo + '&accion=' + accion);
        }

    </script>
</head>

<body>
    <h1>Introduce un verbo</h1>
    <label>Input: <input type="text" id="inputVerbo" placeholder="Introducir verbo"><br></label>

    <input type="button" onclick="usarAJAX('conjugacion')" value="conjugacion">
    <input type="button" onclick="usarAJAX('conjugar')" value="conjugar"><br>

    <div id="respuestaAjax"></div>
</body>

</html>