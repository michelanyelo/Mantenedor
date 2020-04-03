<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

// Crear conexion
$conn = new mysqli($servername, $username, $password, $dbname);
// Comprobar conexion
if ($conn->connect_error) {
	die("Conexión fallida: " . $conn->connect_error);
} 
mysqli_set_charset($conn, 'utf8');
?>
