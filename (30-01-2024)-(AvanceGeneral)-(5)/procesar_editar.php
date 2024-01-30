<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles_index.css">
    <link rel="stylesheet" href="css/styles_agregar.css">
    <title>Editar Producto</title>
</head>
  <body>

        <?php
        // procesar_editar.php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener datos del formulario
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $cantidad = $_POST["cantidad"];
            $precio = $_POST["precio"];
            $total_vendidos = $_POST["total_vendidos"];
            $periodo_venta = $_POST["periodo_venta"];

            // Conexión a la base de datos
            $conexion = new mysqli("127.0.0.1", "root", "", "prueba");

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Actualizar datos en la base de datos
            $consulta = $conexion->prepare("UPDATE productos SET nombre=?, descripcion=?, cantidad=?, precio=?, total_vendidos=?, periodo_venta=? WHERE id=?");
            $consulta->bind_param("ssddiii", $nombre, $descripcion, $cantidad, $precio, $total_vendidos, $periodo_venta, $id);

            if ($consulta->execute()) {
                echo "Producto actualizado correctamente.";
            } else {
                echo "Error al actualizar el producto: " . $conexion->error;
            }

            // Cerrar conexión
            $consulta->close();
            $conexion->close();
            }
        ?>
    <div class="form-container">
    <h4 style="font-weight: bold;"><b><i class="fa fa-shopping-bag" style="color: #2ecc71;"></i>Producto editado correctamente</b></h4>
    <button onclick="cerrarVentana()">Cerrar Ventana</button>
    </div>

    <script src="js/editar.js" ></script>
  </body>
</html>
