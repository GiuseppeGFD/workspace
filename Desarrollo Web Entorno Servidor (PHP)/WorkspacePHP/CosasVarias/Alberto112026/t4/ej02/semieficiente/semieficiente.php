<head>
    <script>
        function accionAJAX() {
            document.getElementById("idProvincias").innerHTML = xmlhttp.responseText; // Sustitución quirúrgica
        }
        function usarAJAX() {
            ccaa = document.getElementById('idCCAA').value;
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open('GET', 'ajax.php?ccaa=' + ccaa, true);
            xmlhttp.send();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    accionAJAX();
                }
            }
        }
    </script>
</head>

<body>
    <h1>Comunidades autónomas (Semieficiente - AJAX)</h1>
    ccaa
    <select id="idCCAA" onchange="usarAJAX()">
        <option>Andalucía</option>
        <option>Aragón</option>
        <option>Asturias (Principado de)</option>
        <option>Canarias</option>
        <option>Cantabria</option>
        <option>Castilla y León</option>
        <option>Castilla-La Mancha</option>
        <option>Cataluña</option>
        <option>Ceuta (Ciudad de)</option>
        <option>Comunidad Valenciana</option>
        <option>Extremadura</option>
        <option>Galicia</option>
        <option>Islas Baleares</option>
        <option>Madrid (Comunidad de)</option>
        <option>Melilla (Ciudad de)</option>
        <option>Murcia (Región de)</option>
        <option>Navarra (Comunidad Foral de)</option>
        <option>País Vasco</option>
        <option>Rioja (La)</option>
    </select>
    <br />

    provincias
    <select id="idProvincias">
        <option>Almería</option>
        <option>Cádiz</option>
        <option>Córdoba</option>
        <option>Granada</option>
        <option>Huelva</option>
        <option>Jaén</option>
        <option>Málaga</option>
        <option>Sevilla</option>
    </select>

    <h3>Escoge una comunidad autónoma</h3>
    <p>Observa el cambio de provincias (recargando TODO desde el servidor)</p>
    <br />
    <button onclick="window.location.href='../index.php'">Menú</button>
</body>