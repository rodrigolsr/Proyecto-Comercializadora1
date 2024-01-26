
//script para la funcionalidad del menú de inicio
// script para la funcionalidad responsiva de la página
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


