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
    <title>Bienvenido Cliente</title>
</head>
<body>

<h2>Bienvenido Cliente</h2>

<p>Hola, <?php echo $_SESSION['usuario']; ?>. Bienvenido a nuestra tienda en línea.</p>

<a href="cerrar_sesion.php">Cerrar Sesión</a>

</body>
</html>
