<!-- editar.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
</head>
<body>
    <?php
    // Obtener el ID del producto a editar
    $id = $_GET["id"];

    // Conexión a la base de datos
    $conexion = new mysqli("127.0.0.1", "root", "contraseña", "prueba");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consultar la base de datos para obtener los datos actuales del producto
    $consulta = $conexion->prepare("SELECT * FROM productos WHERE id = ?");
    $consulta->bind_param("i", $id);
    $consulta->execute();

    // Obtener resultados
    $resultado = $consulta->get_result();

    // Mostrar formulario de edición
    if ($fila = $resultado->fetch_assoc()) {
    ?>
        <h2>Editar Producto</h2>
        <form action="procesar_editar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>" required><br>

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" required><?php echo $fila['descripcion']; ?></textarea><br>

            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" value="<?php echo $fila['cantidad']; ?>" required><br>

            <label for="precio">Precio:</label>
            <input type="text" name="precio" value="<?php echo $fila['precio']; ?>" required><br>

            <input type="submit" value="Guardar Cambios">
        </form>
        <br>
        <a href="index.php">Volver al Listado</a>
    <?php
    } else {
        echo "Producto no encontrado.";
    }

    // Cerrar conexión
    $consulta->close();
    $conexion->close();
    ?>
</body>
</html>
