<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (asegúrate de tener las credenciales correctas)
    $conexion = new mysqli("127.0.0.1", "root", "", "pedidos");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Obtener los datos del formulario
    $modeloProducto = $_POST['modeloProducto'];
    $cantidadExistencias = $_POST['cantidadExistencias'];
    $margen = $_POST['margen'];  
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];

    // Convertir fechas al formato de MySQL (YYYY-MM-DD)
    $fechaInicio = date('Y-m-d', strtotime($fechaInicio));
    $fechaFin = date('Y-m-d', strtotime($fechaFin));

    // Realizar la consulta SQL para obtener el total de ventas
    $sqlConsulta = "SELECT COALESCE(SUM(CantidadPiezas), 0) as totalVentas FROM SalidasProductos WHERE ModeloProducto = ? AND FechaSalida BETWEEN ? AND ?";
    $stmtConsulta = $conexion->prepare($sqlConsulta);
    $stmtConsulta->bind_param("sss", $modeloProducto, $fechaInicio, $fechaFin);
    $stmtConsulta->execute();
    $stmtConsulta->bind_result($totalVentas);
    $stmtConsulta->fetch();
    $stmtConsulta->close();

    // Calcular el StockIdeal
    $stockIdeal = ($cantidadExistencias - $totalVentas) + $margen;

    // Realizar la inserción en la tabla NuevoPedido
    $sqlInsercion = "INSERT INTO NuevoPedido (ModeloProducto, CantidadVendidos, CantidadExistencias, StockIdeal, FechaSalida) VALUES (?, ?, ?, ?, ?)";
    $stmtInsercion = $conexion->prepare($sqlInsercion);
    $stmtInsercion->bind_param("siiis", $modeloProducto, $totalVentas, $cantidadExistencias, $stockIdeal, $fechaFin);
    $stmtInsercion->execute();

    if ($stmtInsercion->affected_rows > 0) {
        // Cerrar la conexión
        $stmtInsercion->close();
        $conexion->close();

        // Redirigir a la página principal o mostrar un mensaje de éxito
        header("Location: index.php");
        exit();
    } else {
        echo "Error al insertar en la tabla NuevoPedido: " . $stmtInsercion->error;
    }
}
?>
