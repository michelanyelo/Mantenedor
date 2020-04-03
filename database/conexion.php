<?php 

$mysqli = new mysqli('localhost', 'root', '', 'proyecto');

if($mysqli->connect_error){
	die("Error en la conexión" . $mysqli->connect_error);
}else{
	printf("Servidor Información: %s\n", $mysqli->server_info);
}

?>