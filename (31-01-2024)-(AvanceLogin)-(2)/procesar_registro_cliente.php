<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_completo = $_POST["nombre_completo"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO clientes (nombre_completo, correo_electronico, direccion, numero_telefonico, nombre_usuario, contrasena) 
            VALUES ('$nombre_completo', '$correo', '$direccion', '$telefono', '$nombre_usuario', '$contrasena')";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente registrado correctamente.";
    } else {
        echo "Error en el registro del cliente: " . $conn->error;
    }
}

$conn->close();
?>
