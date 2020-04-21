<div class="modal" id="modalEquipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form id="formEquipo">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar nuevo equipo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<!-- PROPIEDAD EQUIPO: IP -->
							<div class="col-4">
								<label>Ip del equipo</label>
								<input type="text" class="form-control" name="IpEquipo">
								<small id="rendimientoProcesadorlHelp" class="form-text text-muted">ej: 192.168.1.1</small>
							</div>

							<!-- PROPIEDAD: TIPO EQUIPO-->
							<div class="col-4">
								<label>Tipo de equipo</label>
								<select class="form-control" name="TipoEquipo" onchange="document.getElementById('text_content1').value=this.options[this.selectedIndex].text">
									<option value="0" selected disabled>Seleccione: </option>
									<?php 
									$Equipo = new Equipos();
									$data_tipo = $Equipo->mostrarTipo();
									if($data_tipo){  
										foreach($data_tipo as $Objeto){?>
											<option value="<?=$Objeto->idTipoEquipos?>"><?=$Objeto->nombre_tipoequipos?></option>
										<?php }
									}?>
								</select>
								<input type="hidden" name="tipoequipo_text" id="text_content1" value="" />
							</div>

							<!-- PROPIEDAD: ESTADO EQUIPO -->
							<div class="col-4">
								<label>Estado de equipo</label>
								<select class="form-control" name="EstadoEquipo" onchange="document.getElementById('text_content2').value=this.options[this.selectedIndex].text">
									<option value="0" selected disabled>Seleccione: </option>
									<?php 
									$Equipo = new Equipos();
									$data_estado = $Equipo->mostrarEstado();
									if($data_estado){  
										foreach($data_estado as $Objeto){?>
											<option value="<?=$Objeto->idEstadoEquipos?>"><?=$Objeto->nombre_estadoequipos?></option>
										<?php }
									}?>
								</select>
								<input type="hidden" name="estadoequipo_text" id="text_content2" value="" />
							</div>
						</div>

						<div class="row" style="margin-top: 30px;">
							<!-- PROPIEDAD: MARCA GABINETE -->
							<div class="col-4">
								<label>Marca del gabinete</label>
								<select class="form-control" name="DicMarcasGabinete" onchange="document.getElementById('text_content3').value=this.options[this.selectedIndex].text" >
									<option value="0" selected disabled>Seleccione: </option>
									<?php 
									$Equipo = new Equipos();
									$data_dicmarcas = $Equipo->mostrarDicMarcas();
									if($data_dicmarcas){  
										foreach($data_dicmarcas as $Objeto){?>
											<option value="<?=$Objeto->idDicMarcas?>"><?=$Objeto->nombre_dicmarcas?></option>
										<?php }
									}?>
								</select>
								<input type="hidden" name="marcagabinete_text" id="text_content3" value="" />
								<small id="gabineteHelp" class="form-text text-muted">Seleccione Genérico(a) si es desconocido</small>
							</div>

							<!-- PROPIEDAD: MARCA PROCESADOR -->
							<div class="col-4">
								<label>Marca del procesador</label>
								<select class="form-control" name="DicMarcasProcesador" onchange="document.getElementById('text_content4').value=this.options[this.selectedIndex].text">
									<option value="0" selected disabled>Seleccione: </option>
									<?php 
									$Equipo = new Equipos();
									$data_dicmarcas = $Equipo->mostrarDicMarcas();
									if($data_dicmarcas){  
										foreach($data_dicmarcas as $Objeto){?>
											<option value="<?=$Objeto->idDicMarcas?>"><?=$Objeto->nombre_dicmarcas?></option>
										<?php }
									}?>
								</select>
								<input type="hidden" name="marcaprocesador_text" id="text_content4" value="" />
							</div>

							<!-- PROPIEDAD: DESCRIPCION PROCESADOR -->
							<div class="col-4">
								<label>Descripción del procesador</label>
								<input type="text" class="form-control" name="inputRendimientoProcesador">
								<small id="rendimientoProcesadorlHelp" class="form-text text-muted">ej: i5-4210U</small>
							</div>
						</div>

						<div class="row" style="margin-top: 30px;">
							<!-- PROPIEDAD: MARCA HDD -->
							<div class="col-4">
								<label>Marca del Disco Duro</label>
								<select class="form-control" name="DicMarcasHDD" onchange="document.getElementById('text_content5').value=this.options[this.selectedIndex].text">
									<option value="0" selected disabled>Seleccione: </option>
									<?php 
									$Equipo = new Equipos();
									$data_dicmarcas = $Equipo->mostrarDicMarcas();
									if($data_dicmarcas){  
										foreach($data_dicmarcas as $Objeto){?>
											<option value="<?=$Objeto->idDicMarcas?>"><?=$Objeto->nombre_dicmarcas?></option>
										<?php }
									}?>
								</select>
								<input type="hidden" name="marcahdd_text" id="text_content5" value="" />
							</div>

							<!-- PROPIEDAD: CAPACIDAD HDD -->
							<div class="col-4">
								<label>Capacidad de HDD</label>
								<input type="text" class="form-control" name="CapacidadHDD">
								<small id="capacidadHDDlHelp" class="form-text text-muted">ej: 500GB ó 1TB</small>
							</div>
						</div>
						<div class="row" style="margin-top: 30px;">

							<!-- PROPIEDAD: MARCA MEMORIA RAM -->
							<div class="col-4">
								<label>Marca de la Memoria RAM</label>
								<select class="form-control" name="DicMarcasRam" onchange="document.getElementById('text_content7').value=this.options[this.selectedIndex].text">
									<option value="0" selected disabled>Seleccione: </option>
									<?php 
									$Equipo = new Equipos();
									$data_dicmarcas = $Equipo->mostrarDicMarcas();
									if($data_dicmarcas){  
										foreach($data_dicmarcas as $Objeto){?>
											<option value="<?=$Objeto->idDicMarcas?>"><?=$Objeto->nombre_dicmarcas?></option>
										<?php }
									}?>
								</select>
								<input type="hidden" name="marcaram_text" id="text_content7" value="" />
							</div>

							<!-- PROPIEDAD: TIPO MEMORIA RAM -->
							<div class="col-4">
								<label>Tipo de RAM</label>
								<select class="form-control" name="TipoRam" onchange="document.getElementById('text_content8').value=this.options[this.selectedIndex].text">
									<option value="0" selected disabled>Seleccione: </option>
									<option value="1">DDR</option>
									<option value="2">DDR2</option>
									<option value="3">DDR3</option>
									<option value="4">DDR4</option>
								</select>
								<input type="hidden" name="tiporam_text" id="text_content8" value="" />
							</div>

							<!-- PROPIEDAD: RENDIMIENTO MEMORIA RAM -->
							<div class="col-4">
								<label>Capacidad de RAM</label>
								<select class="form-control" name="CapacidadRam" onchange="document.getElementById('text_content9').value=this.options[this.selectedIndex].text">
									<option value="0" selected disabled>Seleccione: </option>
									<option value="1">2GB</option>
									<option value="2">3GB</option>
									<option value="3">4GB</option>
									<option value="4">5GB</option>
									<option value="5">6GB</option>
									<option value="6">8GB</option>
									<option value="7">16GB</option>
									<option value="8">32GB</option>
								</select>
								<input type="hidden" name="capacidadram_text" id="text_content9" value="" />
							</div>
						</div>

						<div class="row" style="margin-top: 30px;">
							<!-- PROPIEDAD: MARCA MONITOR -->
							<div class="col-4">
								<label>Marca del Monitor</label>
								<select class="form-control" name="DicMarcasMonitor" onchange="document.getElementById('text_content10').value=this.options[this.selectedIndex].text">
									<option value="0" selected disabled>Seleccione: </option>
									<?php 
									$Equipo = new Equipos();
									$data_dicmarcas = $Equipo->mostrarDicMarcas();
									if($data_dicmarcas){  
										foreach($data_dicmarcas as $Objeto){?>
											<option value="<?=$Objeto->idDicMarcas?>"><?=$Objeto->nombre_dicmarcas?></option>
										<?php }
									}?>
								</select>
								<input type="hidden" name="marcamonitor_text" id="text_content10" value="" />
							</div>

							<!-- PROPIEDAD: TAMAÑO MONITOR -->
							<div class="col-4">
								<label>Tamaño del Monitor</label>
								<select class="form-control" name="TamañoMonitor" onchange="document.getElementById('text_content11').value=this.options[this.selectedIndex].text">
									<option value="0" selected disabled>Seleccione: </option>
									<option value="1">14</option>
									<option value="2">15</option>
									<option value="3">17</option>
									<option value="4">19</option>
									<option value="5">21</option>
									<option value="6">22</option>
									<option value="7">24</option>
									<option value="8">25</option>
									<option value="9">26</option>
									<option value="10">27</option>
									<option value="11">29</option>
									<option value="12">32</option>
									<option value="13">34</option>
								</select>
								<input type="hidden" name="tamañomonitor_text" id="text_content11" value="" />
								<small id="monitorHelp" class="form-text text-muted">Tamaño en pulgadas</small>
							</div>
						</div>

						<div class="row" style="margin-top: 30px;">
							<!-- PROPIEDAD: SISTEMA OPERATIVO -->
							<div class="col-4">
								<label>Sistema Operativo</label>
								<select class="form-control" name="SistemaOperativo" onchange="document.getElementById('text_content12').value=this.options[this.selectedIndex].text">
									<option value="0" selected disabled>Seleccione: </option>
									<?php 
									$Equipo = new Equipos();
									$data_dicso = $Equipo->mostrarDicSO();
									if($data_dicso){  
										foreach($data_dicso as $Objeto){?>
											<option value="<?=$Objeto->idDicSO?>"><?=$Objeto->nombre_dicso?></option>
										<?php }
									}?>
								</select>
								<input type="hidden" name="sistemaoperativo_text" id="text_content12" value="" />
							</div>

							<!-- PROPIEDAD: VERSION SO -->
							<div class="col-4">
								<label>Versión del Sistema Operativo</label>
								<select id="SELVersionSO" class="form-control" name="VersionSO" onchange="document.getElementById('text_content13').value=this.options[this.selectedIndex].text">
									<option value="0" selected disabled>Seleccione: </option>
									<option value="1">Home</option>
									<option value="2">Pro</option>
									<option value="3">Professional</option>
									<option value="4">Professional N</option>
									<option value="5">Enterprise</option>
									<option value="6">Education</option>
									<option value="7">IOT Core</option>
									<option value="8">Pro for Workstations</option>
									<option value="9">Ultimate</option>
									<option value="10">Starter</option>
									<option value="11">Home Basic</option>
									<option value="12">Home Premium</option>
									<option value="13">Home Edition N</option>
									<option value="14">Standard Edition</option>
									<option value="15">Datacenter</option>
									<option value="16">Foundation</option>
									<option value="17">Business</option>
									<option value="18">Server</option>
									<option value="19">Advanced Server</option>
								</select>
								<input type="hidden" name="versionsistema_text" id="text_content13" value="" />
							</div>

							<!-- PROPIEDAD: ARQUITECTURA SO -->
							<div class="col-4">
								<label>Arquitectura del Sistema Operativo</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="ArquitecturaSO" value="x32 bits">
									<label class="form-check-label" for="inlineArquitectura1">x32 bits</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="ArquitecturaSO" id="inlineArquitectura2" value="x64 bits">
									<label class="form-check-label" for="inlineArquitectura2">x64 bits</label>
								</div>
							</div>
						</div>

						<div class="row" style="margin-top: 30px;">
							<!-- PROPIEDAD: VERSION OFFICE -->
							<div class="col-4">
								<label>Versión de Office</label>
								<select class="form-control" name="VersionOffice" onchange="document.getElementById('text_content14').value=this.options[this.selectedIndex].text">
									<option value="0" selected disabled>Seleccione: </option>
									<?php 
									$Equipo = new Equipos();
									$data_dicoffice = $Equipo->mostrarDicOffice();
									if($data_dicoffice){  
										foreach($data_dicoffice as $Objeto){?>
											<option value="<?=$Objeto->idDicOffice?>"><?=$Objeto->nombre_office?></option>
										<?php }
									}?>
								</select>
								<input type="hidden" name="versionoffice_text" id="text_content14" value="" />
							</div>

							<!-- PROPIEDAD: EDICION OFFICE -->
							<div class="col-4">
								<label>Edición de Office</label>
								<select class="form-control" name="EdicionOffice" onchange="document.getElementById('text_content15').value=this.options[this.selectedIndex].text">
									<option value="0" selected disabled>Seleccione: </option>
									<option value="1">365</option>
									<option value="2">Home and Student</option>
									<option value="3">Home & Business</option>
									<option value="4">Professional</option>
									<option value="5">Professional Plus</option>
									<option value="6">Standard</option>
								</select>
								<input type="hidden" name="edicionoffice_text" id="text_content15" value="" />
							</div>

							<!-- PROPIEDAD: ANTIGUEDAD -->
							<div class="col-4">
								<label>Antigüedad del equipo</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="AntiguedadEquipo" value="Nuevo">
									<label class="form-check-label" for="inlineAntiguedad1">Nuevo</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="AntiguedadEquipo" id="inlineAntiguedad2" value="Usado">
									<label class="form-check-label" for="inlineAntiguedad2">Usado</label>
								</div>
							</div>
						</div>

						<div class="row" style="margin-top: 30px; float:right;">
							<div class="fec col-10" style="display:none;">
								<label>Fecha de adquisición</label>
								<input id="datepicker" name="FechaInEquipo">
								<script>
									$('#datepicker').datepicker({
										format: 'dd/mm/yyyy',
										autoclose: true,
										uiLibrary: 'bootstrap4'
									});
								</script>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary btnGuardarEquipoNuevo">Guardar</button>
				</div>
			</div>
		</form>
	</div>
</div>