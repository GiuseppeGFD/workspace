<head>
<script>
    function clasificarMarca() {
        var xmlhttp = new XMLHttpRequest();
        var marca = document.getElementById('marca').value;
        xmlhttp.open("GET", "clasificar_marca.php?marca=" + marca, true);
        xmlhttp.send();
        
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("mensaje").innerHTML =
                '<b>País de Origen: ' + xmlhttp.responseText + '</b>';
            }
        }
    }

    function listarModelos() {
        var xmlhttp = new XMLHttpRequest();
        var marca = document.getElementById('marca').value;
        xmlhttp.open("GET", "listar_modelos.php?marca=" + marca, true);
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
    <h3>Introduce una Marca de Coche (ej: Toyota)</h3>
    <input type="text" id="marca" />
    <br />
    <button onclick="clasificarMarca()">País de Origen</button>
    <button onclick="listarModelos()">Ver Modelos</button>
    
    <div id="mensaje"></div>
    <h3>..y observa el resultado</h3>
</body>