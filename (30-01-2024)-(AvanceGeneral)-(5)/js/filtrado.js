function filtrarProductos() {
    var atributo = document.getElementById('filtro-atributo').value;
    var valor = document.getElementById('filtro-valor').value;
  
    // Realizar una solicitud AJAX a filtrado.php con los parámetros
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('resultados-filtrado').innerHTML = xhr.responseText;
        }
    };
    xhr.open('POST', 'filtrado.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('atributo=' + atributo + '&valor=' + valor);
  
    // Evitar que el formulario se envíe tradicionalmente
    return false;
  }
  
  // Obtener el formulario por su ID y asignar la función al evento de envío
  document.getElementById('filtrar').addEventListener('submit', function (e) {
    e.preventDefault();
    filtrarProductos();
  });