<?php require_once('../funciones.php'); ?>
<h1>Añadir tareas</h1>
<form action="" method="POST">
    <label>Nombre de la tarea: <input type="text" name="nombreTarea" placeholder="Introduce la tarea"><br></label>
    <label>Empleado <?php selectEmpleados(); ?> <br></label>
    <input type="submit" value="asignar">
</form>
<?php añadirTarea();
volver(); ?>