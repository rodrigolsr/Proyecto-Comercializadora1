/*function mostrarFormulario() {  
    // Cargar el contenido de agregar.php en una ventana emergente (esta función está en revisión, al no funcionar más que directamente en el index)
    var modal = window.open('agregar.php', 'Registrar Producto', 'width=500,height=1000');
}*/


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

/*function recargarPagina() {
    location.reload(true); // La función reload(true) fuerza una recarga desde el servidor, (esta función está en revisión, al no funcionar más que directamente en el index)
}
*/


