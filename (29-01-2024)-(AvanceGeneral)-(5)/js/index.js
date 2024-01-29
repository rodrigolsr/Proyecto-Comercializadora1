// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.width = "300px";
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}


function mostrarFormulario() {
    // Cargar el contenido de agregar.php en una ventana emergente
    var modal = window.open('agregar.php', 'Registrar Producto', 'width=500,height=500');
}

