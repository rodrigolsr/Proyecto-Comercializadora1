<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario en Línea</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
    <h2>Filtrar Productos</h2>
    <form action="filtrar_productos.php" method="post">
        <label for="filtro-atributo">Filtrar por Atributo:</label>
        <select name="atributo" id="filtro-atributo">
            <option value="id">ID</option>
            <option value="nombre">Nombre</option>
            <option value="descripcion">Descripción</option>
            <option value="cantidad">Cantidad</option>
            <option value="precio">Precio</option>
            <option value="total_vendidos">Total Vendidos</option>
            <option value="periodo_venta">Periodo Venta</option>
            <option value="stock_minimo">Stock Mínimo</option>
            <option value="stock_ideal">Stock Ideal</option>
        </select>
        
        <label for="filtro-valor">Valor:</label>
        <input type="text" name="valor" id="filtro-valor" required>

        <input type="submit" value="Filtrar">
    </form>

    <!-- Div para los resultados del filtrado -->
    <div id="resultados-filtrado"></div>

    <h2>Listado de Productos</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total Vendidos</th>
            <th>Periodo Venta</th>
            <th>Stock Mínimo</th>
            <th>Stock Ideal</th>
            <th>Acciones</th>
        </tr>
        <?php
        $conexion = new mysqli("127.0.0.1", "root", "", "prueba");

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $consulta = $conexion->query("SELECT * FROM productos");

        if (!$consulta) {
            die("Error en la consulta: " . $conexion->error);
        }

        while ($fila = $consulta->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$fila['id']}</td>";
            echo "<td>{$fila['nombre']}</td>";
            echo "<td>{$fila['descripcion']}</td>";
            echo "<td>{$fila['cantidad']}</td>";
            echo "<td>{$fila['precio']}</td>";
            echo "<td>{$fila['total_vendidos']}</td>";
            echo "<td>{$fila['periodo_venta']}</td>";
            echo "<td>{$fila['stock_minimo']}</td>";
            echo "<td>{$fila['stock_ideal']}</td>";
            echo "<td>
                    <a href='editar.php?id={$fila['id']}'>Editar</a> |
                    <a href='eliminar.php?id={$fila['id']}'>Eliminar</a>
                  </td>";
            echo "</tr>";
        }

        $conexion->close();
        ?>
    </table>
    <br>
    <a href="agregar.php">Agregar Nuevo Producto</a>

    <!-- Script para cargar resultados de filtrado en el div -->
    <script src="js/filtrado.js"></script>
    
</body>
</html>
