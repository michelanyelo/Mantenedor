<?php 
/**
* @author: Miguel Monzón Martínez
* @copyright: miguel.monzon@quillota.cl
* @version: 0.8
* 13-04-2020
*/ 
require_once "class/Conexion.php"; 
require_once "class/Equipos.php";

if(!isset($_SESSION['usuario'])){
	header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS -->
	<!-- ESTILO PAGINA -->
	<link rel="stylesheet" href="assets/css/body.css">
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- CALENDARIO -->
	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<!-- DATATABLE BS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">

	<!-- JS -->
	<!-- FONTAWESOME -->
	<script src="https://kit.fontawesome.com/fd01d0d9be.js" crossorigin="anonymous"></script>
	<!-- JAVASCRIPT -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<!-- CALENDARIO -->
	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

	<!-- DATATABLE BS -->
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>

	
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

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-top: 2px; padding-bottom: 30px">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerInicio" aria-controls="navbarTogglerInicio" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse center-text" id="navbarTogglerInicio">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item active">
						<a class="nav-link" href="welcome.php"> Inventario <span class="sr-only">(current)</span></a>
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
			</ul>

			<!-- PANEL DEL USUARIO -->
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item"><a class="nav-link " style="color: white;">
					<i class="fas fa-user"></i> <?=$_SESSION['usuario']?></a>
				</li>
				<li class="nav-item"><a class="nav-link" href="views/logout.php" style="color: #dc3545 !important">
					<i class="fas fa-sign-out-alt"></i> Desconectar</a>
				</li>
			</ul>

		</div>
	</nav>
</div>

<div class="table-container container">
	<div class="row">
		<!-- PANEL DE ACCESO RAPIDO -->
		<div class="col-3">
			<?php require_once "views/accesorapidoequipoView.php" ?>
		</div>
		<!-- VISUALIZACION DE LOS EQUIPOS EN DATATABLE -->
		<div class="col-9">
			<?php require_once "views/equipoView.php";?>
		</div>
	</div>
</div>
</body>
</html>

<!-- FUNCIONES JS -->
<!-- METODO ORDENAMIENTO VERSION SO -->
<script type="text/javascript">
	$("#SELVersionSO").append($("#SELVersionSO option:gt(0)").sort(function (a, b) {
		return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
	}));
</script>

<script type="text/javascript">
	$(document).ready(function(){

		// INICIAR DATATABLE 
		var table = $('#tabla-equipos').DataTable( {
			language: {
				"decimal": "",
				"emptyTable": "No hay información",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
				"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
				"infoFiltered": "(Filtrado de _MAX_ total entradas)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ Entradas",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "Sin resultados encontrados",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			},

			lengthChange: false,
			buttons: [{
				extend: "excel", className: "btn btn-secondary",
				exportOptions: {
					columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13]
				},
				text: '<i class="far fa-file-excel"></i> Excel'
			},{
				extend: "pdf", className: "btn btn-secondary", text: '<i class="far fa-file-pdf"></i> PDF', orientation: 'landscape', pageSize: 'LEGAL', exportOptions: {
					columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13]
				}
			},{
				extend:"print", className: "btn btn-secondary", text: '<i class="fas fa-print"></i> Imprimir' ,
				exportOptions: {
					columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13]
				}
			}],
		});


		table.buttons().container()
		.appendTo( '#tabla-equipos_wrapper .col-md-6:eq(0)' );

		// ACTIVAR CALENDARIO EN EQUIPOS USADOS
		$("input[name$='AntiguedadEquipo']").click(function() {
			var test = $(this).val();
			if (test=='Usado'){
				$('div.fec').show();
				$('#datepicker').show();
			}else{
				$('div.fec').hide();
			}
		});

		// REGISTRAR EL INGRESO DE UN NUEVO EQUIPO HACIA EQUIPOCONTROLLER.PHP
		$(".btnGuardarEquipoNuevo").on("click",function(){
			var accion = 'agregar';
			$.ajax({
				type: "POST",
				url: "controller/equipoController.php",
				data: $('#formEquipo').serialize() + '&accion=' + accion,
				success: function(data){
					if (data==''){ 
						alert("Datos almacenados exitosamente");
					}else{
						alert(data);
					}
				}
			});
		});

		// ACCIONES DESDE LA TABLA EQUIPOS: VER DETALLES, 
		$(".btnVerEquipo").on('click',function(){
			var idEquipo = $(this).val();
			$("#contentMyModal").load("views/equipodetallesView.php",{idEquipo:idEquipo});
		});
		// MODIFICAR (equipomodificarView.php)
		$(".btnEditarEquipo").on('click',function(){
			// OCULTAR DATATABLE
			$('#tabla-equipos').parents('div.dataTables_wrapper').first().hide();
			$("#tabla-equipos").hide();
			var idEquipo = $(this).val();
			$("#contentMyForm").load("views/equipomodificarView.php",{idEquipo:idEquipo});
		});
		// Y ELIMINAR (equipoController.php)
		$(".btnEliminarEquipo").on('click',function(){
			var result = confirm("¿Está seguro/a de esta operación?");
			if (result) {
				var accion = 'eliminar';
				var idEquipo = $(this).val();
				$.ajax({
					type    : 'POST',
					url     : 'controller/equipoController.php',
					data    : {idEquipo:idEquipo, accion:accion},
					success: function(data){
						if (data!='error'){  
							alert("Equipo eliminado exitosamente");
							window.location.reload(true);
						}
					}
				});
			}
		});

	});
</script>
