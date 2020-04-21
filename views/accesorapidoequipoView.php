<div class="list-group center-text">
	<a class="list-group-item list-group-item-action disabled" style ="background-color: #2d3436 ;color: white !important">Menú Rápido de Equipo</a>

	<!-------------------------- MODAL EQUIPO ------------------------------->
	<!-- BOTON MODAL NUEVO EQUIPO -->
	<a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#modalEquipo" data-backdrop="static" data-keyboard="false"><i class="fas fa-desktop"></i> Agregar Nuevo</a>
	
	<!-- MODAL NUEVO EQUIPO-->
	
	<?php require_once("equiponuevoView.php") ?>

	<!-- EVITAR CIERRE DEL MODAL -->
	<script>
		$( ".btnGuardarEquipoNuevo").click(function( event ) {
			event.preventDefault();
		});
	</script>
	
	<!-------------------------- MODAL EQUIPO A DPTO ------------------------------>

	<!-- BOTON MODAL -->
	<a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#modalDepartamento"><i class="far fa-building"></i> Mover a Departamento</a>


	<!-- MODAL DPTO -->
	<div class="modal" id="modalDepartamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Button trigger modal -->
	<a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#modalOficina"><i class="fas fa-door-open"></i> Mover a Oficina</a>

	<!-- Modal Oficina-->
	<div class="modal" id="modalOficina" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<!-- BOTON MODAL EQUIPO A FUNCIONARIO -->
	<a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#modalFuncionario"><i class="fas fa-user-plus"></i> Asignar a Funcionario</a>

	<!-- Modal Funcionario-->
	<div class="modal" id="modalFuncionario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</div>