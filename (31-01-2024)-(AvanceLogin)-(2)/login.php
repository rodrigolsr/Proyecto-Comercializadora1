<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form action="procesar_login.php" method="post">
    <label for="usuario">Usuario (Correo o Nombre de Usuario):</label>
    <input type="text" name="usuario" required>

    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" required>

    <button type="submit">Login</button>
</form>

</body>
</html>
