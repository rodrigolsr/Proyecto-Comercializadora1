<!-- editar.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
</head>
<body>
    <?php
    $id = $_GET["id"];
    $conexion = new mysqli("127.0.0.1", "root", "", "prueba");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $consulta = $conexion->prepare("SELECT * FROM productos WHERE id = ?");
    $consulta->bind_param("i", $id);
    $consulta->execute();

    $resultado = $consulta->get_result();

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

            <label for="total_vendidos">Total Vendidos:</label>
            <input type="number" name="total_vendidos" value="<?php echo $fila['total_vendidos']; ?>" required><br>

            <label for="periodo_venta">Periodo Venta (meses):</label>
            <input type="number" name="periodo_venta" value="<?php echo $fila['periodo_venta']; ?>" required><br>

            <input type="submit" value="Guardar Cambios">
        </form>
        <br>
        <a href="index.php">Volver al Listado</a>
    <?php
    } else {
        echo "Producto no encontrado.";
    }

    $consulta->close();
    $conexion->close();
    ?>
</body>
</html>
