<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $atributo = $_POST["atributo"];
    $valor = $_POST["valor"];

    // Conexión a la base de datos
    $conexion = new mysqli("127.0.0.1", "root", "", "prueba");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Construir la consulta dinámicamente usando placeholders
    $consulta = $conexion->prepare("SELECT * FROM productos WHERE REPLACE(LOWER(TRIM($atributo)), ' ', '') LIKE REPLACE(LOWER(?), ' ', '')");

    // Agregar el carácter '%' al valor para permitir búsquedas flexibles
    $valor = '%' . str_replace(' ', '%', $valor) . '%';

    // Bind de parámetros y ejecución de la consulta
    $consulta->bind_param('s', $valor);
    $consulta->execute();
    $resultado = $consulta->get_result();

    // Almacenar los resultados en una variable
    $resultadosHTML = "<table class='w3-table w3-bordered'>
                        <tr class='w3-dark-grey'>
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

    // Cerrar conexión
    $consulta->close();
    $conexion->close();

    // Mostrar resultados
    echo $resultadosHTML;
    echo "<div class='w3-container w3-padding-large'>
            <form action='index.php' method='get'>
                <button type='submit' class='w3-button w3-green w3-margin-top w3-margin-bottom'>Limpiar Filtro</button>
            </form>
          </div>";
}

/*
Problema Inicial:

Comparación Sensible a Mayúsculas y Minúsculas: El problema inicial era que la búsqueda no era insensible a mayúsculas y minúsculas, lo que provocaba que las coincidencias fallaran cuando se ingresaban búsquedas con diferencias de capitalización.

Espacios en Blanco en Búsqueda: Además, el sistema no manejaba adecuadamente los espacios en blanco al realizar la búsqueda. Por ejemplo, si un registro tenía espacios en blanco y se buscaba sin espacios, no se obtenían resultados.

Solución Propuesta:

Uso de Funciones SQL:

LOWER(): Esta función convierte todos los caracteres de una cadena a minúsculas. Esto se utiliza para hacer que la comparación sea insensible a mayúsculas y minúsculas.

TRIM(): Esta función elimina los espacios en blanco al principio y al final de una cadena. Ayuda a manejar los problemas relacionados con los espacios en blanco.

REPLACE(): Se utiliza para eliminar los espacios en blanco de la cadena antes de realizar la comparación. Esto asegura que las búsquedas sin espacios coincidan correctamente con los registros que tienen espacios.

Operador LIKE:

El operador LIKE se utiliza para realizar búsquedas de patrones en una columna. En este caso, se emplea para buscar registros que coincidan parcialmente con el valor proporcionado.
Parámetros Dinámicos:

El uso de parámetros dinámicos en la consulta preparada permite una construcción segura y eficiente de la consulta SQL. Aquí, se utiliza un marcador de posición (?) para representar el valor que se reemplazará en la consulta.


*/

?>

