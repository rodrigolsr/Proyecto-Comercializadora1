<!-- eliminar.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles_index.css">
    <link rel="stylesheet" href="css/styles_agregar.css">

    <title>Eliminar Producto</title>
</head>
<body>
    <?php
    // Obtener el ID del producto a eliminar
    $id = $_GET["id"];

    // Conexión a la base de datos
    $conexion = new mysqli("127.0.0.1", "root", "", "prueba");

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
    <div class="form-container">
    <h4 style="font-weight: bold;"><b><i class="fa fa-shopping-bag" style="color: #2ecc71;"></i>Producto eliminado correctamente</b></h4>
    <button onclick="cerrarVentana()">Cerrar Ventana</button>
    </div>
    <!--<a href="index.php">Volver al Listado</a>!-->

<script src="js/eliminar.js" ></script>
</body>
</html>




