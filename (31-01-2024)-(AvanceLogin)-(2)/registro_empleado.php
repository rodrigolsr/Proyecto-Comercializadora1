<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empleados</title>
</head>
<body>

<h2>Registro de Empleados</h2>

<form action="procesar_registro_empleado.php" method="post">


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

    <label for="rol">Rol:</label>
    <select name="rol" required>
        <option value="gerente">Gerente</option>
        <option value="trabajador">Trabajador</option>
    </select>

    <button type="submit">Registrar Empleado</button>
</form>

</body>
</html>
