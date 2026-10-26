<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function usarAJAX() {
            var ccaa = document.getElementById("seleccionCCAA").value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("subcategoria").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET', 'p1.php?seleccionCCAA=' + ccaa, true);
            xmlhttp.send();

        }
        window.onload = usarAJAX; 
    </script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="seleccion">
        <?php
        require_once('p1.php');
        $ccaa = array_keys($comunidades);
        ?>
        <label>ccaa</label>
        <select onchange='usarAJAX()' id="seleccionCCAA">
            <?php foreach ($ccaa as $comunidad): ?>
                <option <?= $comunidad == $ccaa[0] ? 'selected' : '' ?>><?= $comunidad ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label>provincia</label>
        <div id="subcategoria"></div>
    </div>
</body>

</html>