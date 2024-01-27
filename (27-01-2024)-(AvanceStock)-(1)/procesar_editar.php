<?php
// procesar_editar.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];
    $total_vendidos = $_POST["total_vendidos"];
    $periodo_venta = $_POST["periodo_venta"];

    $conexion = new mysqli("127.0.0.1", "root", "", "prueba");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $consulta = $conexion->prepare("UPDATE productos SET nombre=?, descripcion=?, cantidad=?, precio=?, total_vendidos=?, periodo_venta=? WHERE id=?");
    $consulta->bind_param("ssdiiii", $nombre, $descripcion, $cantidad, $precio, $total_vendidos, $periodo_venta, $id);

    if ($consulta->execute()) {
        echo "Producto actualizado correctamente.";
    } else {
        echo "Error al actualizar el producto: " . $conexion->error;
    }

    $consulta->close();
    $conexion->close();
}
?>
