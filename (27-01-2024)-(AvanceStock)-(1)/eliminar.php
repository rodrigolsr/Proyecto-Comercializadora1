<!-- eliminar.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Producto</title>
</head>
<body>
    <?php
    $id = $_GET["id"];
    $conexion = new mysqli("127.0.0.1", "root", "", "prueba");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $consulta = $conexion->prepare("DELETE FROM productos WHERE id = ?");
    $consulta->bind_param("i", $id);

    if ($consulta->execute()) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto: " . $conexion->error;
    }

    $consulta->close();
    $conexion->close();
    ?>
    <br>
    <a href="index.php">Volver al Listado</a>
</body>
</html>
