<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <script>
        function usarAJAX(accion) {
            var verbo = document.getElementById("verbo").value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "servidor.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("accion=" + encodeURIComponent(accion) + "&verbo=" + encodeURIComponent(verbo));

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("miDiv").innerHTML = xmlhttp.responseText;
                }
            }
        }
    </script>
</head>

<body>
    <h3>Introduce un verbo</h3>
    <input type="text" id="verbo" name="verbo" placeholder="Introduce un verbo"><br><br>
    <input type="button" onclick="usarAJAX('conjugacion')" value="Conjugación">
    <input type="button" onclick="usarAJAX('conjugar')" value="Conjugar">

    <div id="miDiv" style="margin: 10px 0;"></div>

    <p>...y observa el resultado</p>
</body>

</html>
