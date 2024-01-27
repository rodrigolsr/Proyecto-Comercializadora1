<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $atributo = $_POST["atributo"];
    $valor = $_POST["valor"];

    $conexion = new mysqli("127.0.0.1", "root", "", "prueba");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $valor = '%' . $valor . '%';

    $consulta = $conexion->prepare("SELECT * FROM productos WHERE $atributo LIKE ?");
    $consulta->bind_param('s', $valor);

    $consulta->execute();
    $resultado = $consulta->get_result();

    $resultadosHTML = "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total Vendidos</th>
                            <th>Periodo Venta (meses)</th>
                            <th>Stock Mínimo</th>
                            <th>Stock Ideal</th>
                            <th>Acciones</th>
                        </tr>";

    while ($fila = $resultado->fetch_assoc()) {
        $resultadosHTML .= "<tr>";
        $resultadosHTML .= "<td>{$fila['id']}</td>";
        $resultadosHTML .= "<td>{$fila['nombre']}</td>";
        $resultadosHTML .= "<td>{$fila['descripcion']}</td>";
        $resultadosHTML .= "<td>{$fila['cantidad']}</td>";
        $resultadosHTML .= "<td>{$fila['precio']}</td>";
        $resultadosHTML .= "<td>{$fila['total_vendidos']}</td>";
        $resultadosHTML .= "<td>{$fila['periodo_venta']}</td>";
        $resultadosHTML .= "<td>{$fila['stock_minimo']}</td>";
        $resultadosHTML .= "<td>{$fila['stock_ideal']}</td>";
        $resultadosHTML .= "<td>
                <a href='editar.php?id={$fila['id']}'>Editar</a> |
                <a href='eliminar.php?id={$fila['id']}'>Eliminar</a>
              </td>";
        $resultadosHTML .= "</tr>";
    }

    $resultadosHTML .= "</table>";

    $consulta->close();
    $conexion->close();

    echo $resultadosHTML;
    echo "<br><a href='index.php'>Volver al Listado Completo</a>";
}
?>
