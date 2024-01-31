<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'trabajador') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido Trabajador</title>
</head>
<body>

<h2>Esta es la Página del Trabajador</h2>

<p>Hola, <?php echo $_SESSION['usuario']; ?>. Bienvenido a tu página de trabajador.</p>

<a href="cerrar_sesion.php">Cerrar Sesión</a>

</body>
</html>
