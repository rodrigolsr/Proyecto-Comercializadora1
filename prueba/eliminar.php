<!-- eliminar.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Producto</title>
</head>
<body>
    <?php
    // Obtener el ID del producto a eliminar
    $id = $_GET["id"];

    // Conexión a la base de datos
    $conexion = new mysqli("127.0.0.1", "root", "contraseña", "prueba");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Eliminar el producto de la base de datos
    $consulta = $conexion->prepare("DELETE FROM productos WHERE id = ?");
    $consulta->bind_param("i", $id);

    if ($consulta->execute()) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto: " . $conexion->error;
    }

    // Cerrar conexión
    $consulta->close();
    $conexion->close();
    ?>
    <br>
    <a href="index.php">Volver al Listado</a>
</body>
</html>
