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
    // procesar_agregar.php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener datos del formulario
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $cantidad = $_POST["cantidad"];
        $precio = $_POST["precio"];
        $total_vendidos = $_POST["total_vendidos"];
        $periodo_venta = $_POST["periodo_venta"];

        // Calcular stock_minimo y stock_ideal
        $stock_minimo = $total_vendidos / $periodo_venta;
        $stock_ideal = $cantidad - $stock_minimo;

        // Conexión a la base de datos
        $conexion = new mysqli("127.0.0.1", "root", "", "prueba");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Insertar datos en la base de datos
        $consulta = $conexion->prepare("INSERT INTO productos (nombre, descripcion, cantidad, precio, total_vendidos, periodo_venta, stock_minimo, stock_ideal) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $consulta->bind_param("ssdsdddd", $nombre, $descripcion, $cantidad, $precio, $total_vendidos, $periodo_venta, $stock_minimo, $stock_ideal);
        
        if ($consulta->execute()) {
            echo "Producto agregado correctamente.";
        } else {
            echo "Error al agregar el producto: " . $conexion->error;
        }

        // Cerrar conexión
        $consulta->close();
        $conexion->close();
    }
    ?>
    <div class="form-container">
    <h4 style="font-weight: bold;"><b><i class="fa fa-shopping-bag" style="color: #2ecc71;"></i>Producto agregado correctamente</b></h4>
    <button onclick="cerrarVentana()">Cerrar Ventana</button>
    </div>

    <script src="js/agregar.js" ></script>
  </body>
</html>
