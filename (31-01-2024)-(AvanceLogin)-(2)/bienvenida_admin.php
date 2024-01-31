<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido Administrador</title>
</head>
<body>

<h2>Bienvenido Administrador</h2>

<p>Hola, <?php echo $_SESSION['usuario']; ?>. Bienvenido a la página del administrador.</p>
<a href="bienvenida_admin.php">Inicio</a> | <a href="registro_empleado.php">Registrar Empleado</a> | <a href="cerrar_sesion.php">Cerrar Sesión</a>
<a href="cerrar_sesion.php">Cerrar Sesión</a>

</body>
</html>
