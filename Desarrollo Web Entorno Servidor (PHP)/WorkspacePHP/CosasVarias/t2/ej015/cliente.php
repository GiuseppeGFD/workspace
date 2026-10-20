<form action="servidor.php" method="post">
    <label>Usuario </label>
    <input type="text" name="usuario" placeholder="User Name"><br>
    <label>Contraseña </label>
    <input type="password" name="contraseña" placeholder="Password"><br>
    <input type="hidden" name="oculto" value="BATICULO">
    <label>Rojo</label><input type="radio" name="radio" value="color" /><br>
    <label>Azul</label><input type="radio" name="radio" value="color" checked="" /><br>
    <label>Verde</label><input type="radio" name="radio" value="color" /><br>

    <input type="submit" value="enviar">

</form>