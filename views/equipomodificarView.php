<?php 
$idEquipo = $_POST['idEquipo'];
require_once "../class/Conexion.php"; 
include "../class/Equipos.php";
$Equipos = new Equipos();
$data = $Equipos->mostrarDatosId($idEquipo);
foreach ($data as $Objeto) {  
	?>
	<form id="formEquipoM">
		<div class="row">
			<!-- PROPIEDAD EQUIPO: IP -->
			<div class="col-4">
				<label>Ip del equipo</label>
				<input type="text" class="form-control" name="IpEquipo" value="<?=$Objeto->ipEquipos;?>">
				<small class="form-text text-muted">ej: 192.168.1.1</small>
			</div>

			<!-- PROPIEDAD: TIPO EQUIPO-->
			<div class="col-4">
				<label>Tipo de equipo</label>
				<select class="form-control" id="selTipoEquipo" name="TipoEquipo" onchange="document.getElementById('text_content16').value=this.options[this.selectedIndex].text">
					<?php 
					$IDtipoequipo = $Objeto->idTipoEquipos;
					switch ($IDtipoequipo){
						case 1:
						$Nombretipoequipo = 'CPU';
						break;
						case 2: 
						$Nombretipoequipo = 'Notebook';
						break;
						case 3: 
						$Nombretipoequipo = 'Servidor';
						break;
						default: 
						echo "Dato Erróneo";
					}
					?>
					<option selected disabled><?=$Nombretipoequipo;?></option>
					<?php 
					$data_tipo = $Equipos->mostrarTipo();
					if($data_tipo){  
						foreach($data_tipo as $Objeto_tipo){?>
							<option><?=$Objeto_tipo->nombre_tipoequipos;?></option>
						<?php }
					}?>
				</select>
				<input type="hidden" name="tipoequipo_text" id="text_content16" value="<?=$Nombretipoequipo;?>" />
			</div>

			<!-- PROPIEDAD: ESTADO EQUIPO -->
			<div class="col-4">
				<label>Estado de equipo</label>
				<select class="form-control" id="selEstadoEquipo" name="EstadoEquipo" onchange="document.getElementById('text_content17').value=this.options[this.selectedIndex].text">
					<?php 
					$IDestadoequipo = $Objeto->idEstadoEquipos;
					switch ($IDestadoequipo){
						case 0:
						$Nombreestadoequipo = 'Inactivo';
						break;
						case 1: 
						$Nombreestadoequipo = 'Activo';
						break;
						default: 
						echo "Dato Erróneo";
					}
					?>
					<option value="<?=$Objeto->idEstadoEquipos;?>" selected disabled><?=$Nombreestadoequipo;?></option>
					<?php 
					$data_estado = $Equipos->mostrarEstado();
					if($data_estado){  
						foreach($data_estado as $Objeto_estado){?>
							<option value="<?=$Objeto_estado->idEstadoEquipos;?>"><?=$Objeto_estado->nombre_estadoequipos;?></option>
						<?php }
					}?>
				</select>
				<input type="hidden" name="estadoequipo_text" id="text_content17" value="<?=$Nombreestadoequipo;?>" />
			</div>
		</div>

		<div class="row" style="margin-top: 30px;">
			<div class="col-4">
				<!-- PROPIEDAD: MARCA GABINETE -->
				<label>Marca del gabinete</label>
				<select class="form-control" id="selDicMarcasGabinete" name="DicMarcasGabinete" onchange="document.getElementById('text_content18').value=this.options[this.selectedIndex].text" >
					<option value="<?=$Objeto->marca_equipos;?>" selected disabled><?=$Objeto->marca_equipos;?></option>
					<?php 
					$data_dicmarcas = $Equipos->mostrarDicMarcas();
					if($data_dicmarcas){  
						foreach($data_dicmarcas as $Objeto_gabinete){?>
							<option value="<?=$Objeto_gabinete->idDicMarcas;?>"><?=$Objeto_gabinete->nombre_dicmarcas;?></option>
						<?php }
					}?>
				</select>
				<input type="hidden" name="marcagabinete_text" id="text_content18" value="<?=$Objeto->marca_equipos;?>" />
				<small class="form-text text-muted">Seleccione Genérico(a) si es desconocido</small>
			</div>

			<!-- DECONSTRUCCIÓN CADENA MARCA PROCESADOR -->
			<?php  $cadena_marcaObjeto = $Objeto->procesador_equipos; //cadena completa marca procesador
			$data_dicmarcas = $Equipos->mostrarDicMarcas();
			if($data_dicmarcas){
				foreach ($data_dicmarcas as $Objeto_procesador) {
					if(substr_count($cadena_marcaObjeto, $Objeto_procesador->nombre_dicmarcas) > 0){
						$cadena_marca = $Objeto_procesador->nombre_dicmarcas; //marca procesador
						$int_marca = $Objeto_procesador->idDicMarcas;
					}
				}
			}
			$cadena_descprocesador = trim(substr($cadena_marcaObjeto, strlen($cadena_marca)));
			?>

			<!-- PROPIEDAD: MARCA PROCESADOR -->
			<div class="col-4">
				<label>Marca del procesador</label>
				<select class="form-control" id="selDicMarcasProcesador" name="DicMarcasProcesador" onchange="document.getElementById('text_content19').value=this.options[this.selectedIndex].text">
					<option value="<?=$int_marca;?>" selected disabled><?=$cadena_marca;?></option>
					<?php 
					$data_dicmarcas = $Equipos->mostrarDicMarcas();
					if($data_dicmarcas){  
						foreach($data_dicmarcas as $Objeto_procesador){?>
							<option value="<?=$Objeto_procesador->idDicMarcas;?>"><?=$Objeto_procesador->nombre_dicmarcas;?></option>
						<?php }
					}?>
				</select>
				<input type="hidden" name="marcaprocesador_text" id="text_content19" value="<?=$cadena_marca?>" />
			</div>

			<!-- PROPIEDAD: RENDIMIENTO PROCESADOR -->
			<div class="col-4">
				<label>Descripción del procesador</label>
				<input type="text" class="form-control" name="inputRendimientoProcesador" value="<?=$cadena_descprocesador ?>"> 
				<small class="form-text text-muted">ej: i5-4210U</small>
			</div>
		</div>

		<div class="row" style="margin-top: 30px;">
			<!-- DECONSTRUCCIÓN MARCA HDD-->
			<?php  $cadena_marcaObjeto = $Objeto->hdd_equipos;
			$data_dicmarcas = $Equipos->mostrarDicMarcas();
			if($data_dicmarcas){
				foreach ($data_dicmarcas as $Objeto_hdd) {
					if(substr_count($cadena_marcaObjeto, $Objeto_hdd->nombre_dicmarcas) > 0){
						$cadena_marca = $Objeto_hdd->nombre_dicmarcas;
						$int_marca = $Objeto_hdd->idDicMarcas;
					}
				}
			}
			$cadena_deschdd = trim(substr($cadena_marcaObjeto, strlen($cadena_marca)));
			?>

			<!-- PROPIEDAD: MARCA HDD -->
			<div class="col-4">
				<label>Marca del Disco Duro</label>
				<select class="form-control" id="selDicMarcasHDD" name="DicMarcasHDD" onchange="document.getElementById('text_content20').value=this.options[this.selectedIndex].text">
					<option value="<?=$int_marca;?>" selected disabled><?=$cadena_marca;?></option>
					<?php 
					$data_dicmarcas = $Equipos->mostrarDicMarcas();
					if($data_dicmarcas){  
						foreach($data_dicmarcas as $Objeto_hdd){?>
							<option value="<?=$Objeto_hdd->idDicMarcas;?>"><?=$Objeto_hdd->nombre_dicmarcas;?></option>
						<?php }
					}?>
				</select>
				<input type="hidden" name="marcahdd_text" id="text_content20" value="<?=$cadena_marca;?>" />
			</div>

			<!-- PROPIEDAD: CAPACIDAD HDD -->
			<div class="col-4">
				<label>Capacidad de HDD</label>
				<input type="text" class="form-control" name="CapacidadHDD" value="<?=$cadena_deschdd;?>">
				<small class="form-text text-muted">ej: 500GB ó 1TB</small>
			</div>
		</div>
		<div class="row" style="margin-top: 30px;">

			<!-- DECONSTRUCCIÓN RAM-->
			<?php  $cadena_marcaObjeto = $Objeto->ram_equipos; //cadena completa marca ram
			$data_dicmarcas = $Equipos->mostrarDicMarcas();
			if($data_dicmarcas){
				foreach ($data_dicmarcas as $Objeto_ram) {
					if(substr_count($cadena_marcaObjeto, $Objeto_ram->nombre_dicmarcas) > 0){
						$cadena_marca = $Objeto_ram->nombre_dicmarcas; //marca ram
						$int_marca = $Objeto_ram->idDicMarcas;
					}
				}
			}

			$cadena_tiporam = substr($cadena_marcaObjeto, strlen($cadena_marca));
			// eliminar espacio en blanco inicio y final
			$cadena_tiporam = trim($cadena_tiporam);
			$cadena_tiporam = substr($cadena_tiporam, 0, strpos($cadena_tiporam, ' '));
			$cadena_capacidadram = substr($cadena_marcaObjeto, strlen($cadena_marca) + strlen($cadena_tiporam) +2);

			?>

			<!-- PROPIEDAD: MARCA MEMORIA RAM -->
			<div class="col-4">
				<label>Marca de la Memoria RAM</label>
				<select class="form-control" id="selDicMarcasRam" name="DicMarcasRam" onchange="document.getElementById('text_content22').value=this.options[this.selectedIndex].text">
					<option value="<?=$int_marca;?>" selected disabled><?=$cadena_marca;?></option>
					<?php 
					$Equipos = new Equipos();
					$data_dicmarcas = $Equipos->mostrarDicMarcas();
					if($data_dicmarcas){  
						foreach($data_dicmarcas as $Objeto_ram){?>
							<option value="<?=$Objeto_ram->idDicMarcas;?>"><?=$Objeto_ram->nombre_dicmarcas;?></option>
						<?php }
					}?>
				</select>
				<input type="hidden" name="marcaram_text" id="text_content22" value="<?=$cadena_marca;?>" />
			</div>

			<!-- PROPIEDAD: TIPO MEMORIA RAM -->
			<div class="col-4">
				<label>Tipo de RAM</label>
				<select class="form-control" id="selTipoRam" name="TipoRam" onchange="document.getElementById('text_content23').value=this.options[this.selectedIndex].text">
					<option value="0" selected disabled><?=$cadena_tiporam;?></option>
					<option value="1">DDR</option>
					<option value="2">DDR2</option>
					<option value="3">DDR3</option>
					<option value="4">DDR4</option>
				</select>
				<input type="hidden" name="tiporam_text" id="text_content23" value="<?=$cadena_tiporam;?>" />
			</div>

			<!-- PROPIEDAD: CAPACIDAD MEMORIA RAM -->
			<div class="col-4">
				<label>Capacidad de RAM</label>
				<select class="form-control" id="selCapacidadRam" name="CapacidadRam" onchange="document.getElementById('text_content24').value=this.options[this.selectedIndex].text">
					<option value="0" selected disabled><?=$cadena_capacidadram;?></option>
					<option value="1">2GB</option>
					<option value="2">3GB</option>
					<option value="3">4GB</option>
					<option value="4">5GB</option>
					<option value="5">6GB</option>
					<option value="6">8GB</option>
					<option value="7">16GB</option>
					<option value="8">32GB</option>
				</select>
				<input type="hidden" name="capacidadram_text" id="text_content24" value="<?=$cadena_capacidadram;?>" />
			</div>
		</div>
		<div class="row" style="margin-top: 30px;">

			<!-- DECONSTRUCCIÓN MONITOR-->
			<?php  $cadena_marcaObjeto = $Objeto->monitor_equipos; 
			$data_dicmarcas = $Equipos->mostrarDicMarcas();
			if($data_dicmarcas){
				foreach ($data_dicmarcas as $Objeto_monitor) {
					if(substr_count($cadena_marcaObjeto, $Objeto_monitor->nombre_dicmarcas) > 0){
						$cadena_marca = $Objeto_monitor->nombre_dicmarcas;
						$int_marca = $Objeto_monitor->idDicMarcas;
					}
				}
			}
			$cadena_dimensionmonitor = substr($cadena_marcaObjeto, strlen($cadena_marca));
			?>

			<!-- PROPIEDAD: MARCA MONITOR -->
			<div class="col-4">
				<label>Marca del Monitor</label>
				<select class="form-control" id="selDicMarcasMonitor" name="DicMarcasMonitor" onchange="document.getElementById('text_content25').value=this.options[this.selectedIndex].text">
					<option value="<?=$int_marca;?>" selected disabled><?=$cadena_marca;?></option>
					<?php 
					$Equipos = new Equipos();
					$data_dicmarcas = $Equipos->mostrarDicMarcas();
					if($data_dicmarcas){  
						foreach($data_dicmarcas as $Objeto_monitor){?>
							<option value="<?=$Objeto_monitor->idDicMarcas;?>"><?=$Objeto_monitor->nombre_dicmarcas;?></option>
						<?php }
					}?>
				</select>
				<input type="hidden" name="marcamonitor_text" id="text_content25" value="<?=$cadena_marca;?>" />
			</div>

			<!-- PROPIEDAD: TAMAÑO MONITOR -->
			<div class="col-4">
				<label>Tamaño del Monitor</label>
				<select class="form-control" id="selTamañoMonitor" name="TamañoMonitor" onchange="document.getElementById('text_content26').value=this.options[this.selectedIndex].text">
					<option value="0" selected disabled><?=$cadena_dimensionmonitor;?></option>
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
				<input type="hidden" name="tamañomonitor_text" id="text_content26" value="<?=$cadena_dimensionmonitor;?>" />
				<small class="form-text text-muted">Tamaño en pulgadas</small>
			</div>
		</div>
		
		<!-- DECONSTRUCCIÓN CADENA SISTEMA OPERATIVO -->
		<?php  $cadena_sistemaObjeto = $Objeto->so_equipos;
		$data_dicso = $Equipos->mostrarDicSO();
		if($data_dicso){
			foreach ($data_dicso as $Objeto_so) {
				if(substr_count($cadena_sistemaObjeto, $Objeto_so->nombre_dicso) > 0){
					$cadena_SO = $Objeto_so->nombre_dicso;
					$int_SO = $Objeto_so->idDicSO;
				}
			}
		}
		$cadena_versionSO = substr($cadena_sistemaObjeto, strlen($cadena_SO));
		?>

		<!-- PROPIEDAD: SISTEMA OPERATIVO -->
		<div class="row" style="margin-top: 30px;">
			<div class="col-4">
				<label>Sistema Operativo</label>
				<select class="form-control" id="selSistema" name="SistemaOperativo" onchange="document.getElementById('text_content27').value=this.options[this.selectedIndex].text">
					<option value="<?=$int_SO;?>" selected disabled><?=$cadena_SO;?></option>
					<?php 
					$Equipos = new Equipos();
					$data_dicso = $Equipos->mostrarDicSO();
					if($data_dicso){  
						foreach($data_dicso as $Objeto_dicso){?>
							<option value="<?=$Objeto_dicso->idDicSO;?>"><?=$Objeto_dicso->nombre_dicso;?></option>
						<?php }
					}?>
				</select>
				<input type="hidden" name="sistemaoperativo_text" id="text_content27" value="<?=$cadena_SO;?>" />
			</div>

			<!-- PROPIEDAD: VERSION SO -->
			<div class="col-4">
				<label>Versión del Sistema Operativo</label>
				<select class="form-control" id="SELVersionSOM" name="VersionSO" onchange="document.getElementById('text_content28').value=this.options[this.selectedIndex].text">
					<option value="0" selected disabled><?=$cadena_versionSO;?></option>
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
				<input type="hidden" name="versionsistema_text" id="text_content28" value="<?=$cadena_versionSO;?>" />
			</div>

			<!-- DECONSTRUCCIÓN CADENA ARQUITECTURA SO -->
			<?php  $cadena_arquitecturaObjeto = $Objeto->arquitectura_equipos;
			?>
			<!-- PROPIEDAD: ARQUITECTURA SO -->
			<div class="col-4">
				<label>Arquitectura del Sistema Operativo</label>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineArquitectura1M" value="x32 bits" 
					<?php 
					if ($cadena_arquitecturaObjeto=='x32 bits'){echo 'checked';}?>>
					<label class="form-check-label" for="inlineArquitectura1M">x32 bits</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineArquitectura2M" value="x64 bits"	
					<?php 
					if ($cadena_arquitecturaObjeto=='x64 bits'){echo 'checked';}?>>
					<label class="form-check-label" for="inlineArquitectura2M">x64 bits</label>
				</div>
			</div>
		</div>

		<div class="row" style="margin-top: 30px;">
			<!-- DECONSTRUCCIÓN CADENA OFFICE -->
			<?php  $cadena_officeObjeto = $Objeto->office_equipos;

			$data_dicoffice = $Equipos->mostrarDicOffice();
			if($data_dicoffice){
				foreach ($data_dicoffice as $Objeto_office) {
					if(substr_count($cadena_officeObjeto, $Objeto_office->nombre_office) > 0){
						$cadena_office = $Objeto_office->nombre_office;
						$int_office = $Objeto_office->idDicOffice;
					}
				}
			}
			$cadena_versionOffice = substr($cadena_officeObjeto, strlen($cadena_office));
			?>

			<!-- PROPIEDAD: VERSION OFFICE -->
			<div class="col-4">
				<label>Versión de Office</label>
				<select class="form-control" id="selVersionOffice" name="VersionOffice" onchange="document.getElementById('text_content29').value=this.options[this.selectedIndex].text">
					<option value="<?=$int_office;?>" selected disabled><?=$cadena_office;?></option>
					<?php 
					$Equipos = new Equipos();
					$data_dicoffice = $Equipos->mostrarDicOffice();
					if($data_dicoffice){  
						foreach($data_dicoffice as $Objeto_office){?>
							<option value="<?=$Objeto_office->idDicOffice;?>"><?=$Objeto_office->nombre_office;?></option>
						<?php }
					}?>
				</select>
				<input type="hidden" name="versionoffice_text" id="text_content29" value="<?=$cadena_office;?>" />
			</div>

			<!-- PROPIEDAD: EDICION OFFICE -->
			<div class="col-4">
				<label>Edición de Office</label>
				<select class="form-control" id="selEdicionOffice" name="EdicionOffice" onchange="document.getElementById('text_content30').value=this.options[this.selectedIndex].text">
					<option value="0" selected disabled><?=$cadena_versionOffice;?></option>
					<option value="1">365</option>
					<option value="2">Home and Student</option>
					<option value="3">Home & Business</option>
					<option value="4">Professional</option>
					<option value="5">Professional Plus</option>
					<option value="6">Standard</option>
				</select>
				<input type="hidden" name="edicionoffice_text" id="text_content30" value="<?=$cadena_versionOffice;?>" />
			</div>

			<!-- DECONSTRUCCION CADENA FECHA -->
			<?php 
			$cadena = $Objeto->fechain_equipos;
			$array = explode("-", $cadena);
			$dia = $array[2];
			$dia = trim(substr($dia, 0, 2));
			$mes = $array[1];
			$año = $array[0];
			$fechafinal = $dia . "/" . $mes . "/" . $año; 
			?>
			<!-- PROPIEDAD: ANTIGUEDAD -->
			<div class="col-4">
				<label>Antigüedad del equipo</label><br>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="AntiguedadEquipo" id="inlineAntiguedad1M" value="Nuevo" 
					<?php 
					if ($Objeto->ant_equipos=='Nuevo'){echo 'checked';}?>>
					<label class="form-check-label" for="inlineAntiguedad1M">Nuevo</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="AntiguedadEquipo" id="inlineAntiguedad2M" value="Usado"	
					<?php 
					if ($Objeto->ant_equipos=='Usado'){echo 'checked';}?>>
					<label class="form-check-label" for="inlineAntiguedad2M">Usado</label>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top: 30px;">
			<div class="col-8">
				<label>Últimas Modificaciones</label><br>
				<textarea class="form-control" name="ModificacionEquipo" rows="3"><?=$Objeto->modificacion_equipos;?></textarea> 
			</div>
			<div class="fec col-4" style="display:none;">
				<label>Fecha de adquisición</label>
				<input id="datepickerM" name="FechaInEquipoM" value="<?=$fechafinal?>">
				<script>
					$('#datepickerM').datepicker({
						format: "dd/mm/yyyy",
						autoclose: true,
						uiLibrary: 'bootstrap4'
					});
				</script>
				<small class="form-text text-muted">DD/MM/AAAA</small>
			</div>
		</div>
		<div class="row" style="margin-top: 50px;" >
			<button type="button" class="btn btn-secondary btnCancelarModificar" style="margin-right: 25px;">Cancelar</button>
			<button type="submit" class="btn btn-primary btnGuardarModificar" >Guardar</button>
		</div>	
	</form>
<?php } ?>

<!-- METODO ORDENAMIENTO VERSION SO -->
<script type="text/javascript">
	$("#SELVersionSOM").append($("#SELVersionSOM option:gt(0)").sort(function (a, b) {
		return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
	}));
</script>

<script type="text/javascript">
	$(document).ready(function(){
		// PROPIEDAD: ANTIGUEDAD (MOSTRAR CALENDARIO)
		if($('input:radio[name=AntiguedadEquipo]:checked').val() == 'Usado'){
			$('div.fec').show();
		}
		// PROPIEDAD: ANTIGUEDAD (EVENTO CALENDARIO)
		$("input[name$='AntiguedadEquipo']").click(function() {
			var test = $(this).val();
			if (test=='Usado'){
				$('div.fec').show();
				$('#datepickerM').show();
			}else{
				$('div.fec').hide();
			}
		});

		$(".btnGuardarModificar").on('click', function(){
			var accion = 'modificar';
			var idEquipo = <?php echo $_POST['idEquipo']; ?>;
			$.ajax({
				type    : 'POST',
				url     : 'controller/equipoController.php',
				data    : $("#formEquipoM").serialize() + '&idEquipo=' + idEquipo + '&accion=' + accion,
				success: function(data){
					if (data==''){ 
						alert("Equipo modificado exitosamente");
						window.location.reload(true);
					}else{
						alert(data);
					}
				}
			});
		});
		$(".btnCancelarModificar").on('click',function(){
			window.location.reload(true);
		});
	});
</script>