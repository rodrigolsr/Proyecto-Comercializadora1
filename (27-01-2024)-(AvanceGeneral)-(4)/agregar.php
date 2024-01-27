<!-- agregar.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
</head>
<body>
    <h2>Agregar Nuevo Producto</h2>
    <form action="procesar_agregar.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" required><br>

        <label for="precio">Precio:</label>
        <input type="text" name="precio" required><br>

        <input type="submit" value="Agregar Producto">
    </form>
    <br>
    <a href="index.php">Volver al Listado</a>
</body>
</html>
