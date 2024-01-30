
function cerrarVentana() {
    // Cierra la ventana emergente actual
    window.close();
    }

    function validarFormulario() {
    // Obtener los valores de los campos del formulario
    var nombre = document.getElementById('nombre').value;
    var descripcion = document.getElementById('descripcion').value;
    var cantidad = document.getElementById('cantidad').value;
    var precio = document.getElementById('precio').value;
    var totalVendidos = document.getElementById('total_vendidos').value;
    var periodoVenta = document.getElementById('periodo_venta').value;

    // Validar que los campos no estén vacíos
    if (nombre.trim() === '' || descripcion.trim() === '' || cantidad.trim() === '' || precio.trim() === '' || totalVendidos.trim() === '' || periodoVenta.trim() === '') {
    alert('Todos los campos son obligatorios. Por favor, llénelos.');
    return false;
    }

    // Validar el formato del precio
    if (isNaN(parseFloat(precio))) {
    alert('Por favor, ingrese un precio válido. Ejemplo: 39 o 39.00');
    return false;
    }

    // Validar que los campos de cantidad, total vendidos y periodo venta sean números finitos
    if (isNaN(cantidad) || isNaN(totalVendidos) || isNaN(periodoVenta)) {
    alert('Por favor, ingrese valores numéricos para Cantidad, Total Vendidos y Período de Venta.');
    return false;
    }

    return true;
}



