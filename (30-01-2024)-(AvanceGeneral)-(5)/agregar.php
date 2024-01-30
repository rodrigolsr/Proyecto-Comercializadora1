<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles_index.css">
    <link rel="stylesheet" href="css/styles_agregar.css">
    <title>Agregar Producto</title>
 
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
            <input type="number" name="precio" required step="0.1"><br>

            <label style="font-weight: bold;" for="total_vendidos">Total Vendidos:</label>
            <input type="number" name="total_vendidos" required><br>

            <label style="font-weight: bold;" for="periodo_venta">Periodo Venta (meses):</label>
            <input type="number" name="periodo_venta" required><br>

            <input type="submit" value="Agregar Producto">
            <button onclick="cerrarVentana()">Cancelar</button>
        </form>
        <br>
    </div>

    <script src="js/agregar.js" ></script>
</body>
</html>
