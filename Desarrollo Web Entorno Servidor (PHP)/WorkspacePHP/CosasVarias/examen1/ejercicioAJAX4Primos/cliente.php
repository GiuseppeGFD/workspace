<head>
<script>
    function clasificarPrimo() {
        var xmlhttp = new XMLHttpRequest();
        var numero = document.getElementById('numero').value;
        xmlhttp.open("GET", "clasificar_primo.php?numero=" + numero, true);
        xmlhttp.send();
        
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("mensaje").innerHTML =
                '<b>Clasificación: ' + xmlhttp.responseText + '</b>';
            }
        }
    }

    function generarDivisores() {
        var xmlhttp = new XMLHttpRequest();
        var numero = document.getElementById('numero').value;
        xmlhttp.open("GET", "generar_divisores.php?numero=" + numero, true);
        xmlhttp.send();
        
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("mensaje").innerHTML =
                '<select>' + xmlhttp.responseText + '</select>';
            }
        }
    }
</script>
</head>
<body>
    <h3>Introduce un Número Entero</h3>
    <input type="number" id="numero" value="12" />
    <br />
    <button onclick="clasificarPrimo()">Clasificar (Primo/Compuesto)</button>
    <button onclick="generarDivisores()">Ver Divisores</button>
    
    <div id="mensaje"></div>
    <h3>..y observa el resultado</h3>
</body>