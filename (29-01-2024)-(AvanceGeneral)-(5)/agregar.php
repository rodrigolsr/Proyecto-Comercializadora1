<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <link rel="stylesheet" href="css/styles.css">
    <title>Agregar Producto</title>
    <style>
        body {
            background-color:#edffed;
        }
        .form-container {
            background-color: #e5ffe5;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #145a32;
            width: 50%;
            margin: 50px auto; /* Ajuste para centrar vertical y horizontalmente */
            box-sizing: border-box;
        }
        label {
            color:#145a32;
            display: block;
            margin-bottom: 5px;
        }
        input, textarea,button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #128f46;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        button {
            background-color: #EA250A ;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }
        a {
            color:##145a32;
            text-decoration: none;
        }
        h4 {
            color:#00341A  ; /* Color verde esmeralda para los títulos */
            text-align: center; /* Centra el texto */

        }
    </style>
</head>
<body>
    <div class="form-container">
        <h4 style="font-weight: bold;"><b>  <i class="fas fa-shopping-cart"></i>Agregar Nuevo Producto</b></h4>
        <h4 style="font-weight: bold;"><b><i class="fa fa-shopping-bag" style="color: #2ecc71;"></i> Registro de artículo</b></h4>       
        <form action="procesar_agregar.php" method="post">
            <label style="font-weight: bold;" for="nombre">Nombre:</label>
            <input type="text" name="nombre" required><br>

            <label style="font-weight: bold;" for="descripcion">Descripción:</label>
            <textarea name="descripcion" required></textarea><br>

            <label style="font-weight: bold;" for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" required><br>

            <label style="font-weight: bold;" for="precio">Precio:</label>
            <input type="text" name="precio" required><br>

            <label style="font-weight: bold;" for="total_vendidos">Total Vendidos:</label>
            <input type="number" name="total_vendidos" required><br>

            <label style="font-weight: bold;" for="periodo_venta">Periodo Venta (meses):</label>
            <input type="number" name="periodo_venta" required><br>

            <input type="submit" value="Agregar Producto">
        </form>
        <br>
        <button onclick="cerrarVentana()">Cancelar</button>
    </div>

    <script>
        function validarFormulario() {
            function validarFormulario() {
        // Obtener los valores de los campos del formulario
        var nombre = document.getElementById('nombre').value;
        var descripcion = document.getElementById('descripcion').value;
        var cantidad = document.getElementById('cantidad').value;
        var precio = document.getElementById('precio').value;
        var totalVendidos = document.getElementById('total_vendidos').value;
        var periodoVenta = document.getElementById('periodo_venta').value;

        // Expresión regular para validar el formato del precio
        var regexPrecio = /^\d+(\.\d{1,2})?$/;

        // Validar que los campos no estén vacíos
        if (nombre.trim() === '' || descripcion.trim() === '' || cantidad.trim() === '' || precio.trim() === '' || totalVendidos.trim() === '' || periodoVenta.trim() === '') {
            alert('Todos los campos son obligatorios. Por favor, llénelos.');
            return false;
        }

        // Validar el formato del precio
        if (!regexPrecio.test(precio)) {
            alert('Por favor, ingrese un precio válido. Ejemplo: 39.00');
            return false;
        }

        // Validar que los campos de cantidad, total vendidos y periodo venta sean números
        if (isNaN(cantidad) || isNaN(totalVendidos) || isNaN(periodoVenta)) {
            alert('Por favor, ingrese valores numéricos para Cantidad, Total Vendidos y Período de Venta.');
            return false;
        }

        return true;
    }

    function cerrarVentana() {
        // Cierra la ventana emergente actual
        window.close();
    }

  }
    </script>
</body>
</html>
