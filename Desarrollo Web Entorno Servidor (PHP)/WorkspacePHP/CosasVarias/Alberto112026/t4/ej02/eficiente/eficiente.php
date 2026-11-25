<head>
    <script>
        var ccaa = {
            'Andalucía': ['Almería', 'Cádiz', 'Córdoba', 'Granada', 'Huelva', 'Jaén', 'Málaga', 'Sevilla'],
            'Aragón': ['Huesca', 'Teruel', 'Zaragoza'],
            'Asturias (Principado de)': ['Asturias'], 'Canarias': ['Palmas (Las)', 'Santa Cruz de Tenerife'], 'Cantabria': ['Cantabria'], 'Castilla y León': ['Ávila', 'Burgos', 'León', 'Palencia', 'Salamanca', 'Segovia', 'Soria', 'Valladolid', 'Zamora'], 'Castilla-La Mancha': ['Albacete', 'Ciudad Real', 'Cuenca', 'Guadalajara', 'Toledo'], 'Cataluña': ['Barcelona', 'Gerona', 'Lérida', 'Tarragona'], 'Ceuta (Ciudad de)': ['Ceuta'], 'Comunidad Valenciana': ['Alicante', 'Castellón', 'Valencia'], 'Extremadura': ['Badajoz', 'Cáceres'], 'Galicia': ['Coruña (La)', 'Lugo', 'Orense', 'Pontevedra'], 'Islas Baleares': ['Islas Baleares'], 'Madrid (Comunidad de)': ['Madrid'], 'Melilla (Ciudad de)': ['Melilla'], 'Murcia (Región de)': ['Murcia'], 'Navarra (Comunidad Foral de)': ['Navarra'], 'País Vasco': ['Álava', 'Guipúzcoa', 'Vizcaya'], 'Rioja (La)': ['Rioja (La)']
        }

        function recargarProvincias() {
            var ca = document.getElementById('idCCAA').value;
            var html = '';
            for (provincia of ccaa[ca]) {
                html += ('<option>' + provincia + '</option>');
            }
            document.getElementById('idProvincias').innerHTML = html;
        }
    </script>
</head>

<body>
    <h1>Comunidades autónomas (Eficiente - Sólo JS)</h1>
    ccaa
    <select id="idCCAA" onchange="recargarProvincias()">
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