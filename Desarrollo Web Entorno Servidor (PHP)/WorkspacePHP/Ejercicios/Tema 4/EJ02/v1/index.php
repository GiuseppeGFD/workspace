<?php ?><?php
 $comunidades = [
     'Andalucía' => ['Almería', 'Cádiz', 'Córdoba', 'Granada', 'Huelva', 'Jaén', 'Málaga', 'Sevilla'],
     'Aragón' => ['Huesca', 'Teruel', 'Zaragoza'],
     'Asturias (Principado de)' => ['Asturias'],
     'Canarias' => ['Palmas (Las)', 'Santa Cruz de Tenerife'],
     'Cantabria' => ['Cantabria'],
     'Castilla y León' => ['Ávila', 'Burgos', 'León', 'Palencia', 'Salamanca', 'Segovia', 'Soria', 'Valladolid', 'Zamora'],
     'Castilla-La Mancha' => ['Albacete', 'Ciudad Real', 'Cuenca', 'Guadalajara', 'Toledo'],
     'Cataluña' => ['Barcelona', 'Gerona', 'Lérida', 'Tarragona'],
     'Ceuta (Ciudad de)' => ['Ceuta'],
     'Comunidad Valenciana' => ['Alicante', 'Castellón', 'Valencia'],
     'Extremadura' => ['Badajoz', 'Cáceres'],
     'Galicia' => ['Coruña (La)', 'Lugo', 'Orense', 'Pontevedra'],
     'Islas Baleares' => ['Islas Baleares'],
     'Madrid (Comunidad de)' => ['Madrid'],
     'Melilla (Ciudad de)' => ['Melilla'],
     'Murcia (Región de)' => ['Murcia'],
     'Navarra (Comunidad Foral de)' => ['Navarra'],
     'País Vasco' => ['Álava', 'Guipúzcoa', 'Vizcaya'],
     'Rioja (La)' => ['Rioja (La)']
 ];
 $ccaa = array_keys($comunidades);
 ?>


<head>
    <script> // copia y pega en el examen
        function usarAJAX() {
            var nombre = document.getElementById("ccaa").value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open('GET', 'p1.php?comunidad=' + nombre, true);
            xmlhttp.send();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("miDiv").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.send();
        }
    </script>
</head>

<select onchange="usarAJAX()" name="ccaa" id="ccaa">
    <?php foreach ($ccaa as $comunidad): ?>
        <option><?= $comunidad ?></option>
    <?php endforeach; ?>
</select>

<br>
<label>Provincia:</label>
<div id="miDiv"></div>