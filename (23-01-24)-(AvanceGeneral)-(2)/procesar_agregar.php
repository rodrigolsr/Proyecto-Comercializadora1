<?php
// procesar_agregar.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];

    // Conexión a la base de datos
    $conexion = new mysqli("127.0.0.1", "root", "contraseña", "prueba");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Insertar datos en la base de datos
    $consulta = $conexion->prepare("INSERT INTO productos (nombre, descripcion, cantidad, precio) VALUES (?, ?, ?, ?)");
    $consulta->bind_param("sssd", $nombre, $descripcion, $cantidad, $precio);
    
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
