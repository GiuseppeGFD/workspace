<head>
<script>
    function realizarSuma() {
        var xmlhttp = new XMLHttpRequest();
        var num1 = document.getElementById('num1').value;
        var num2 = document.getElementById('num2').value;
        // Enviamos ambos números
        xmlhttp.open("GET", "operar_suma.php?num1=" + num1 + "&num2=" + num2, true);
        xmlhttp.send();
        
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                // Inyecta el resultado de la suma
                document.getElementById("mensaje").innerHTML =
                '<b>Resultado de la Suma: ' + xmlhttp.responseText + '</b>';
            }
        }
    }

    function generarMultiplos() {
        var xmlhttp = new XMLHttpRequest();
        var num1 = document.getElementById('num1').value;
        var num2 = document.getElementById('num2').value;
        // Enviamos ambos números
        xmlhttp.open("GET", "generar_multiplos.php?num1=" + num1 + "&num2=" + num2, true);
        xmlhttp.send();
        
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                // Inyecta el SELECT con la lista de múltiplos
                document.getElementById("mensaje").innerHTML =
                '<select>' + xmlhttp.responseText + '</select>';
            }
        }
    }
</script>
</head>
<body>
    <h3>Introduce Dos Números</h3>
    <label for="num1">Número 1 (Base/Múltiplos):</label>
    <input type="number" id="num1" value="3" /><br>
    <label for="num2">Número 2 (Límite):</label>
    <input type="number" id="num2" value="20" />
    <br /><br>
    
    <button onclick="realizarSuma()">Calcular Suma (Simple)</button>
    <button onclick="generarMultiplos()">Generar Múltiplos de N1 hasta N2</button>
    
    <div id="mensaje"></div>
    <h3>..y observa el resultado</h3>
</body>