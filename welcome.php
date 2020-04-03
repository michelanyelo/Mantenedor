<?php 
/**
* @author: Miguel Monzón Martínez
* @copyright: miguel.monzon.inf@gmail.com
* @version: 0.3
* 28-02-2020
*/ 
require_once "class/Conexion.php"; 
require_once "class/Equipos.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/body.css">
	<script src="https://kit.fontawesome.com/fd01d0d9be.js" crossorigin="anonymous"></script>
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

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-top: 2px; padding-bottom: 30px">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerInicio" aria-controls="navbarTogglerInicio" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse center-text" id="navbarTogglerInicio">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item active">
						<a class="nav-link" href="welcome.php"> Inicio <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="welcome.php">Inventario</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Funcionarios</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Oficinas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Reportes</a>
					</li>
				</ul>
				<ul class="navbar-nav navbar-right">
					<li><a href="#">Cerrar Sesión</a></li>
				</ul>
			</div>
		</nav>
	</div>

	<div class="table-container container">
		<div class="row">
			<!-- COL 2 PANEL LATERAL IZQ -->
			<div class="col-3">
				<?php require_once "views/accesorapidoequipoView.php" ?>
			</div>
			<div class="col-9">
				<?php require_once "views/equipoView.php";?>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<!-- METODO ORDENAMIENTO VERSION SO -->
<script type="text/javascript">
	$("#selVersionSO").append($("#selVersionSO option:gt(0)").sort(function (a, b) {
		return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
	}));
</script>

<!-- ENVIAR DATOS EQUIPO CONTROLLER  -->
<script type="text/javascript">
	$(document).ready(function(){
		$(".btnGuardarEquipoNuevo").on("click",function(){
			var accion = 'agregar';
			$.ajax({
				type: "POST",
				url: "controller/equipoController.php",
				data: $('#formEquipo').serialize() + '&accion=' + accion,
				success: function(data){
					if (data!='error'){ 
						alert("Datos almacenados exitosamente");
					} else{
						alert("Rellene todos los campos vacíos");
					}
				}
			});
		});
	});
</script>



<!-- 	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/dataTables.bootstrap4.min.js"></script> -->
