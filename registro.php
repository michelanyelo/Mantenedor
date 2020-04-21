<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS -->
	<!-- ESTILO PAGINA -->
	<link rel="stylesheet" href="assets/css/body.css">
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<!-- JS -->
	<!-- FONTAWESOME -->
	<script src="https://kit.fontawesome.com/fd01d0d9be.js" crossorigin="anonymous"></script>
	<!-- JAVASCRIPT -->
	<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<title>Inventario Municipal</title>
</head>
<body>
	<div class="container"> 
		<nav class="navbar navbar-dark bg-dark" style="margin-top:5px;">
			<div class="container-fluid">
				<div class="banner">
					<img src="img/logo-qta.png" width="140" height="55" style="position:absolute;margin-top:8px;">
					<div style="color:white;margin-left: 350px;margin-bottom:20px;margin-top:20px;font-size:30px;">
						<h3 style="margin-top:0px;">Inventario de Computadores</h3>
					</div>
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
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-user"></i></div>
										<input type="text" class="form-control" name="username" placeholder="Nombre de usuario">
									</div>
								</div>
								<div class="form-group" id="user-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-envelope"></i></div>
										<input type="text" class="form-control" name="ecorreo1" placeholder="Correo Electrónico">
										<div class="input-group-prepend">
											<div class="input-group-text">@</div>
											<input type="text" class="form-control" name="ecorreo2" value="quillota.cl" readonly>
										</div>
									</div>
								</div>
								<div class="form-group" id="pass-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-lock"></i></div>
										<input type="password" class="form-control" name="password" placeholder="Contraseña">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm">
										<button type="submit" name="registrar" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> Registrar</button>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm">
										<button class="btn btn-secondary btn-block btnCancelar"> Cancelar</button>
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

<script type="text/javascript">
	$(".btnCancelar").on("click",function(){
		window.close();
	});
</script>