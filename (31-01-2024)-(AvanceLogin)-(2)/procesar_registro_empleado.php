<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
   
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
    $rol = $_POST["rol"];

    $sql = "INSERT INTO empleados (correo_electronico, direccion, numero_telefonico, nombre_usuario, contrasena, rol) VALUES ('$correo',' $direccion',' $telefono ','$nombre_usuario', '$contrasena', '$rol')";

    if ($conn->query($sql) === TRUE) {
        echo "Empleado registrado correctamente.";
    } else {
        echo "Error en el registro del empleado: " . $conn->error;
    }
}

$conn->close();
?>
