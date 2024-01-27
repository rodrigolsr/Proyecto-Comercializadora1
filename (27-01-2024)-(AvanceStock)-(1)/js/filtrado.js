// Esta función utiliza AJAX para cargar los resultados de filtrado en el div
function filtrarProductos() {
    var atributo = document.getElementById('filtro-atributo').value;
    var valor = document.getElementById('filtro-valor').value;

    // Realizar una solicitud AJAX a filtrar_productos.php con los parámetros
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('resultados-filtrado').innerHTML = xhr.responseText;
        }
    };
    xhr.open('POST', 'filtrar_productos.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('atributo=' + atributo + '&valor=' + valor);
}

// Asignar la función al evento de envío del formulario de filtrado
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();
    filtrarProductos();
});
