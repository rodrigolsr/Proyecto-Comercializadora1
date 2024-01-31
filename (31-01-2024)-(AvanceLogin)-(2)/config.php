<?php
$host = "127.0.0.1";
$usuario = "root";
$contrasena = "";
$nombre_bd = "tienda_en_linea";

$conn = new mysqli($host, $usuario, $contrasena, $nombre_bd);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}
?>
