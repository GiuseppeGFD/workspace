<center>
  <h1 style="color:brown;">Formulario Inicio de sesión</h1>

  <form action="p1.php" method="post">
    <table border="1">
      <caption>Ingresa los datos</caption>
      <tr>
        <td>nombre</td>
        <td>mail</td>
        <td>contraseña</td>
      </tr>
      <tr>
        <td>
          <input type="text" name="nombre" placeholder="Nombre...">
        </td>
        <td>
          <input type="text" name="mail" placeholder="Email...">
        </td>
        <td>
          <input type="password" name="contrasena" placeholder="Contraseña...">
        </td>
      </tr>


    </table><br>
    <input type="submit">
    <?php if (isset($_REQUEST['error'])): ?>
      <p style="color: red;"><?= $_REQUEST['error'] ?></p>
    <?php endif; ?>
  </form>
</center>