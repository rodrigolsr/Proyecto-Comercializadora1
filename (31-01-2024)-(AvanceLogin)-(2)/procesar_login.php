<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Lógica para verificar las credenciales
    // Aquí debes adaptar la consulta según tu estructura de base de datos y roles
    $sql = "SELECT * FROM clientes WHERE nombre_usuario = '$usuario' OR correo_electronico = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($contrasena, $row['contrasena'])) {
            $_SESSION['usuario'] = $row['nombre_usuario'];
            header("Location: bienvenida_cliente.php");
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        // Verificar si es un gerente, trabajador o administrador
        $sql = "SELECT * FROM empleados WHERE nombre_usuario = '$usuario'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['rol'] == 'admin' && $contrasena == $row['contrasena']) {
                $_SESSION['usuario'] = $row['nombre_usuario'];
                $_SESSION['rol'] = 'admin';  // Agregamos el rol a la sesión
                header("Location: bienvenida_admin.php");
                exit();
            } elseif ($row['rol'] == 'gerente' && password_verify($contrasena, $row['contrasena'])) {
                $_SESSION['usuario'] = $row['nombre_usuario'];
                $_SESSION['rol'] = 'gerente';  // Agregamos el rol a la sesión
                header("Location: bienvenida_gerente.php");
                exit();
            } elseif ($row['rol'] == 'trabajador' && password_verify($contrasena, $row['contrasena'])) {
                $_SESSION['usuario'] = $row['nombre_usuario'];
                $_SESSION['rol'] = 'trabajador';  // Agregamos el rol a la sesión
                header("Location: bienvenida_trabajador.php");
                exit();
            } else {
                echo "Contraseña incorrecta para gerente, trabajador o administrador";
            }
        } else {
            echo "Usuario no encontrado";
        }
    }
}

$conn->close();
?>
