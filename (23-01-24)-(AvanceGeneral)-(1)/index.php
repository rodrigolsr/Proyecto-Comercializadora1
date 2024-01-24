<!-- index.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario en Línea</title>
    <style>
        /* Reset de estilos para mayor consistencia */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Estilo del cuerpo de la página */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f2f2f2;
    color: #333;
    margin: 0;
    padding: 0;
}

/* Encabezado de la página */
header {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
}

/* Estilo de la tabla de productos */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #3498db;
    color: #fff;
}

/* Estilo para los enlaces de acciones */
a {
    text-decoration: none;
    color: #3498db;
    transition: color 0.3s ease;
}

a:hover {
    color: #207cca;
}

/* Estilo del formulario de agregar/editar producto */
form {
    max-width: 600px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
    color: #333;
}

input[type="text"],
input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #3498db;
    color: #fff;
    padding: 12px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #207cca;
}

/* Pie de página */
footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
}

</style>
</head>
<body>
    <h2>Listado de Productos</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        <?php
// Conexión a la base de datos
$conexion = new mysqli("127.0.0.1", "root", "contraseña", "prueba");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar la base de datos
$consulta = $conexion->query("SELECT * FROM productos");

// Verificar si la consulta fue exitosa
if (!$consulta) {
    die("Error en la consulta: " . $conexion->error);
}

// Mostrar los resultados
while ($fila = $consulta->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$fila['id']}</td>";
    echo "<td>{$fila['nombre']}</td>";
    echo "<td>{$fila['descripcion']}</td>";
    echo "<td>{$fila['cantidad']}</td>";
    echo "<td>{$fila['precio']}</td>";
    echo "<td>
            <a href='editar.php?id={$fila['id']}'>Editar</a> |
            <a href='eliminar.php?id={$fila['id']}'>Eliminar</a>
          </td>";
    echo "</tr>";
}

// Cerrar conexión
$conexion->close();
?>

    </table>
    <br>
    <a href="agregar.php">Agregar Nuevo Producto</a>
</body>
</html>
