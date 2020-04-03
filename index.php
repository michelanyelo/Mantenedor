<?php 
session_start();
if(isset($_SESSION['usuario'])){
	header('Location: welcome.php');
}

include "class/Conexion.php";
include "class/Usuarios.php";
include "controller/userController.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/fd01d0d9be.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" href="assets/css/body.css">
	<title>Historial computadores</title>
</head>
<body>
	<div class="container"> 
		<nav class="navbar navbar-dark bg-dark" style="margin-top:5px;">
			<div class="container-fluid">
				<div class="banner">
					<img src="img/logo-qta.png" width="140" height="55" style="position:absolute;margin-top:8px;">
					<div style="color:red;margin-left:250px;margin-bottom:20px;margin-top:20px;font-size:30px;"><h3 style="margin-top:0px;">Sistema de Inventario</h3></div>
				</div> 
			</div>
		</nav>

		<nav class="navbar navbar-dark bg-dark" style="margin-top: 2px; padding-bottom: 30px">
		</nav>

		<div class="container">
			<div class="row">
				<div class="col-2">
				</div>
				<div class="col-8 main-section">
					<div class="modal-dialog text-center">
						<div class="modal-content">
							<div class="col-12 user-img">
								<img src="img/unisex.png"/>
							</div>
							<form class="col-12" action="" method="POST">
								<div class="form-group" id="user-group">
									<input type="text" class="form-control" name="username" placeholder="Nombre de usuario">
								</div>
								<div class="form-group" id="pass-group">
									<input type="password" class="form-control" name="password" placeholder="Contraseña">
								</div>
								<div class="form-group row">
									<div class="col-sm-6">
										<input type="checkbox" class="form-check-input" id="exampleCheck1">
										<label class="form-check-label" for="exampleCheck1">Recordar contraseña</label>
									</div>
									<div class="col-sm-6 save-pass">
										<button type="submit" name="submit" class="btn btn-danger"><i class="fas fa-sign-in-alt"></i>	Ingresar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-2">
				</div>
			</div>
		</div>
	</div>
</body>
</html>