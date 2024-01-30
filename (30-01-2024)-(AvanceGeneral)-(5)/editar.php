<!-- editar.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles_index.css">
    <link rel="stylesheet" href="css/styles_editar.css">
    <title>Editar Producto</title>
</head>
<body>
    <?php
    // Obtener el ID del producto a editar
    $id = $_GET["id"];

    // Conexión a la base de datos
    $conexion = new mysqli("127.0.0.1", "root", "", "prueba");

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
        <div class="form-container">
        <h4 style="font-weight: bold;"><b>  <i class="fas fa-shopping-cart"></i>Editar Producto</b></h4>
        <h4 style="font-weight: bold;"><b><i class="fa fa-shopping-bag" style="color: #2ecc71;"></i> Corrección Datos de Artículo</b></h4>
        <form action="procesar_editar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>" required><br>

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" required><?php echo $fila['descripcion']; ?></textarea><br>

            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" value="<?php echo $fila['cantidad']; ?>" required><br>

            <label for="precio">Precio:</label>
            <input type="number" name="precio" required step="0.1" value="<?php echo $fila['precio']; ?>" required><br>

            <label style="font-weight: bold;" for="total_vendidos">Total Vendidos:</label>
            <input type="number" name="total_vendidos"  value="<?php echo $fila['total_vendidos']; ?>" required><br>

            <label style="font-weight: bold;" for="periodo_venta">Periodo Venta (meses):</label>
            <input type="number" name="periodo_venta" value="<?php echo $fila['periodo_venta']; ?>" required><br>

            <input type="submit" value="Guardar Cambios">

     
            <button onclick="cerrarVentana()">Cancelar</button>
        </form>
        <br>
        <!--<a href="index.php">Volver al Listado</a>!-->
        </div>
    <?php
    } else {
        echo "Producto no encontrado.";
    }

    // Cerrar conexión
    $consulta->close();
    $conexion->close();
    ?>

<script src="js/editar.js" ></script>
</body>
</html>
