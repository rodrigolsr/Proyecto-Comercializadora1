<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Sistema de Pedidos</title>
    <style>
                        body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                }

                h2 {
                    color: #333;
                }

                form {
                    max-width: 400px;
                    margin: 20px 0;
                }

                label {
                    display: block;
                    margin-bottom: 5px;
                    color: #333;
                }

                input {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 10px;
                }

                button {
                    background-color: #4CAF50;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }

                button:hover {
                    background-color: #45a049;
                }

    </style>    
</head>
<body>
    <h2>Nuevo Pedido</h2>
    <form action="registrar_pedido.php" method="POST">
        <label for="modeloProducto">Modelo de Producto:</label>
        <input type="text" id="modeloProducto" name="modeloProducto" required>

        <label for="cantidadExistencias">Cantidad de Existencias:</label>
        <input type="number" id="cantidadExistencias" name="cantidadExistencias" required>

        <label for="margen">Margen:</label>
        <input type="number" id="margen" name="margen" required>

        <label for="fechaInicio">Fecha de Inicio:</label>
        <input type="date" id="fechaInicio" name="fechaInicio" required>

        <label for="fechaFin">Fecha de Fin:</label>
        <input type="date" id="fechaFin" name="fechaFin" required>

        <button type="submit">Registrar Pedido</button>
          <?php
                // Obtener la conexión a la base de datos (asegúrate de tener las credenciales correctas)
                $conexion = new mysqli("127.0.0.1", "root", "", "pedidos");

                // Verificar la conexión
                if ($conexion->connect_error) {
                    die("Error de conexión: " . $conexion->connect_error);
                }

                // Realizar la consulta SQL para obtener el registro más reciente de NuevoPedido
                $sqlUltimoRegistro = "SELECT * FROM NuevoPedido ORDER BY id DESC LIMIT 1";
                $resultadoUltimoRegistro = $conexion->query($sqlUltimoRegistro);

                // Verificar si se obtuvo el resultado
                if ($resultadoUltimoRegistro) {
                    // Mostrar el registro más reciente
                    if ($resultadoUltimoRegistro->num_rows > 0) {
                        $ultimoRegistro = $resultadoUltimoRegistro->fetch_assoc();
                        echo "<h2>Urgencia de pedido:</h2>";
                        echo "<p>Modelo Producto: " . $ultimoRegistro['ModeloProducto'] . "</p>";
                        echo "<p>Cantidad Vendidos En Periodo Anterior: " . $ultimoRegistro['CantidadVendidos'] . "</p>";
                        echo "<p>Cantidad Existencias: " . $ultimoRegistro['CantidadExistencias'] . "</p>";
                        echo "<p>Piezas a Comprar: " . $ultimoRegistro['StockIdeal'] . "</p>";
                        echo "<p>Periodo de Venta: " . $ultimoRegistro['FechaSalida'] . "</p>";
                    }
                } else {
                    echo "Error en la consulta SQL: " . $conexion->error;
                }

                // Cerrar la conexión
                $conexion->close();
        ?>
    </form>
</body>
</html>
