<head>
    <script>
        var xmlhttp;

        function accionAJAX() {
            document.getElementById('idTabla').innerHTML = xmlhttp.responseText;
        }

        function filtrar() {
            var tipo = document.getElementById('idTipo').value;
            var filtro = document.getElementById('idFiltro').value;
            xmlhttp = new XMLHttpRequest();
            var query_string = 'tipo=' + tipo + '&filtro=' + filtro;
            xmlhttp.open('GET', 'ajax.php?' + query_string, true);
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
    <h1>Lista de empleados</h1>
    <button onclick="filtrar()">Filtrar por</button>
    <select id="idTipo">
        <option>Nombre</option>
        <option>Apellido</option>
        <option>Teléfono</option>
    </select>
    <input type="text" id="idFiltro" />
    <br>
    <table border="1">
        <thead>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
        </thead>
        <tbody id="idTabla">
            <tr>
                <td>Pepe</td>
                <td>García</td>
                <td>637 654 654</td>
            </tr>
            <tr>
                <td>Ana</td>
                <td>García</td>
                <td>637 111 654</td>
            </tr>
            <tr>
                <td>Manolo</td>
                <td>González</td>
                <td>637 654 654</td>
            </tr>
        </tbody>
    </table>
</body>