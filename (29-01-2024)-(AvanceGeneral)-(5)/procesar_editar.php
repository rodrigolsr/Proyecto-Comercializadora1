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
    $consulta = $conexion->prepare("UPDATE productos SET nombre=?, descripcion=?, cantidad=?, precio=? total_vendidos=?, periodo_venta=? WHERE id=?");
    $consulta->bind_param("ssdsdddd", $nombre, $descripcion, $cantidad, $precio, $total_vendidos, $periodo_venta, $id);

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
