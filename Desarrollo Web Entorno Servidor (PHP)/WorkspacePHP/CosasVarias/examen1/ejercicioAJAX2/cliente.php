<head>
<script>
    function clasificarContinente() {
        var xmlhttp = new XMLHttpRequest();
        var ciudad = document.getElementById('ciudad').value;
        xmlhttp.open("GET", "clasificar_continente.php?ciudad=" + ciudad, true);
        xmlhttp.send();
        
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("mensaje").innerHTML =
                '<b>Continente: ' + xmlhttp.responseText + '</b>';
            }
        }
    }

    function listarLugares() {
        var xmlhttp = new XMLHttpRequest();
        var ciudad = document.getElementById('ciudad').value;
        xmlhttp.open("GET", "listar_lugares.php?ciudad=" + ciudad, true);
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
    
    <h3>Introduce una Ciudad (ej: París)</h3>
    <input type="text" id="ciudad" />
    <br />
    <button onclick="clasificarContinente()">Clasificación</button>
    <button onclick="listarLugares()">Ver Lugares</button>
    
    <div id="mensaje"></div>
    <h3>..y observa el resultado</h3>
</body>