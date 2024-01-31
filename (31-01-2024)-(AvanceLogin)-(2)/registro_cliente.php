<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente</title>
</head>
<body>

<h2>Registro de Cliente</h2>

<form action="procesar_registro_cliente.php" method="post">
    <!-- Campos del formulario -->
    <label for="nombre_completo">Nombre Completo:</label>
    <input type="text" name="nombre_completo" required>

    <label for="correo">Correo Electrónico:</label>
    <input type="email" name="correo" required>

    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion" required>

    <label for="telefono">Número Telefónico:</label>
    <input type="tel" name="telefono" required>

    <label for="nombre_usuario">Nombre de Usuario:</label>
    <input type="text" name="nombre_usuario" required>

    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" required>

    <button type="submit">Registrarse</button>
</form>

</body>
</html>
