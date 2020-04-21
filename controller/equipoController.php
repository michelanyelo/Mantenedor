<?php 
require("../class/Conexion.php");
require_once "../class/Equipos.php";

// GUARDAR NUEVO EQUIPO
if(!empty($_POST['IpEquipo'])  && isset($_POST['TipoEquipo'])  && isset($_POST['EstadoEquipo']) && isset($_POST['DicMarcasGabinete'])  && isset($_POST['DicMarcasProcesador']) && !empty($_POST['inputRendimientoProcesador'])  && isset($_POST['DicMarcasHDD']) && isset($_POST['CapacidadHDD'])  && isset($_POST['DicMarcasRam']) && isset($_POST['TipoRam']) && isset($_POST['CapacidadRam']) && isset($_POST['DicMarcasMonitor'])  && isset($_POST['TamañoMonitor'])  && isset($_POST['SistemaOperativo']) && isset($_POST['VersionSO'])  && isset($_POST['ArquitecturaSO']) && isset($_POST['VersionOffice']) && isset($_POST['EdicionOffice']) && isset($_POST['AntiguedadEquipo']) && $_POST['accion'] == 'agregar' ){

	// NUEVA INSTANCIA DEL OBJETO EQUIPO
	$Equipo = new Equipos;
	$ip_equipo = $_POST['IpEquipo'];

	$SW=1;
	try{
		$sql = "SELECT ipEquipos from equipos";
		$resultado = $conn->query($sql);
		if($resultado->num_rows > 0){
			while($fila = $resultado->fetch_assoc()){
				if($ip_equipo == $fila['ipEquipos']){
					$SW=0;
				}
			}
		}
	}catch (Exception $e){
		echo "Error" . $e->getMessage() . "<br>";
	}

	if($SW==0){
		echo "ERROR: Ingreso de IP duplicado";
		exit();
	}else{
			// FUNCION PARA VALIDAR EL FORMATO DE LA IP
		if(filter_var($ip_equipo, FILTER_VALIDATE_IP) !== false){
			$Equipo->setIpequipo($ip_equipo);
		}else{
			echo "ERROR: Formato de IP incorrecto";
			exit();
		}
	}

	// ALMACENAR TIPO EQUIPO FORMATEADO
	$nom_tipo = $_POST['tipoequipo_text'];
	try{
		$sql = "SELECT * from dic_tipo";
		$resultado = $conn->query($sql);
		if($resultado->num_rows > 0){
			while($fila = $resultado->fetch_assoc()){
				if($nom_tipo == $fila['nombre_tipoequipos']){
					$Equipo->setTipoequipo($fila['idTipoEquipos']);
				}
			}
		}
	}catch (Exception $e){
		echo "Error" . $e->getMessage() . "<br>";
	}
	// ALMACENAR ESTADO EQUIPO FORMATEADO
	$nom_estado = $_POST['estadoequipo_text'];
	try{
		$sql = "SELECT * from dic_estado";
		$resultado = $conn->query($sql);
		if($resultado->num_rows > 0){
			while($fila = $resultado->fetch_assoc()){
				if($nom_estado == $fila['nombre_estadoequipos']){
					$Equipo->setEstadoequipo($fila['idEstadoEquipos']);
				}
			}
		}
	}catch (Exception $e){
		echo "Error" . $e->getMessage() . "<br>";
	}
	// PROPIEDAD: GABINETE
	$marca_gabinete = $_POST['marcagabinete_text'];
	$Equipo->setMarcaequipo($marca_gabinete);

	// PROPIEDAD: PROCESADOR
	$marca_procesador = $_POST['marcaprocesador_text'];
	$capacidad_procesador = $_POST['inputRendimientoProcesador'];
	$procesador_final = $marca_procesador . " " . trim($capacidad_procesador);
	$Equipo->setProcesadorequipo($procesador_final);

	// PROPIEDAD: DISCO DURO
	$marca_hdd = $_POST['marcahdd_text'];
	$capacidad_hdd = str_replace(' ', '', $_POST['CapacidadHDD']);
	$capacidad_hdd = strtoupper($capacidad_hdd);
	$hdd_final = $marca_hdd . " " . trim($capacidad_hdd);
	$Equipo->setHddequipo($hdd_final);

	// PROPIEDAD: RAM
	$marca_ram = $_POST['marcaram_text'];
	$tipo_ram = $_POST['tiporam_text'];
	$capacidad_ram = $_POST['capacidadram_text'];
	$ram_final = $marca_ram . " " . $tipo_ram . " " . $capacidad_ram;
	$Equipo->setRamequipo($ram_final);

	// PROPIEDAD: MONITOR
	$marca_monitor = $_POST['marcamonitor_text'];
	$tamaño_monitor = $_POST['tamañomonitor_text'];
	$monitor_final = $marca_monitor . " " . $tamaño_monitor;
	$Equipo->setMonitorequipo($monitor_final);

	// PROPIEDAD: SISTEMA OPERATIVO
	$sistema_operativo = $_POST['sistemaoperativo_text'];
	$version_sistema = $_POST['versionsistema_text'];
	$sistema_final = $sistema_operativo . " " . $version_sistema;
	$Equipo->setSoequipo($sistema_final);

	// PROPIEDAD: ARQUITECTURA
	$Equipo->setArquitecturaequipo($_POST['ArquitecturaSO']);

	// PROPIEDAD: OFFICE
	$version_office = $_POST['versionoffice_text'];
	$edicion_office = $_POST['edicionoffice_text'];
	$office_final = $version_office . " " . $edicion_office;
	$Equipo->setOfficeequipo($office_final);

	// PROPIEDAD: ANTIGÜEDAD
	$Equipo->setAntiguedadequipo($_POST['AntiguedadEquipo']);

	if ($_POST['AntiguedadEquipo'] == 'Nuevo'){
		$Equipo->setFechaIngreso(date("Y-m-d H:i:s"));
	}else{
		$fecha = $_POST['FechaInEquipo'];
		$fechaBD = date ("Y-d-m H:i:s", strtotime($fecha));
		$Equipo->setFechaIngreso($fechaBD);
	}

	// GUARDAR DATOS BD
	$Equipo->grabarDatos();
	unset($Equipo);
	
}else if (isset($_POST['idEquipo']) && $_POST['accion'] == 'modificar') { //MODIFICAR EQUIPO
	$idEquipo = $_POST['idEquipo'];
	$Equipo = new Equipos;
	$ip = $_POST['IpEquipo'];

	// FUNCION PARA VALIDAR EL FORMATO DE LA IP
	if(filter_var($ip, FILTER_VALIDATE_IP) !== false){
		$Equipo->setIpequipo($ip);
	}else{
		echo "ERROR: Formato de IP incorrecto";
		exit();
	}
	
	// PROPIEDAD: TIPO
	$nom_tipo = $_POST['tipoequipo_text'];
	try{
		$sql = "SELECT * from dic_tipo";
		$resultado = $conn->query($sql);
		if($resultado->num_rows > 0){
			while($fila = $resultado->fetch_assoc()){
				if($nom_tipo == $fila['nombre_tipoequipos']){
					$Equipo->setTipoequipo($fila['idTipoEquipos']);
				}
			}
		}
	}catch (Exception $e){
		echo "Error" . $e->getMessage() . "<br>";
	}

	// PROPIEDAD: ESTADO
	$nom_estado = $_POST['estadoequipo_text'];
	try{
		$sql = "SELECT * from dic_estado";
		$resultado = $conn->query($sql);
		if($resultado->num_rows > 0){
			while($fila = $resultado->fetch_assoc()){
				if($nom_estado == $fila['nombre_estadoequipos']){
					$Equipo->setEstadoequipo($fila['idEstadoEquipos']);
				}
			}
		}
	}catch (Exception $e){
		echo "Error" . $e->getMessage() . "<br>";
	}

	// PROPIEDAD: GABINETE
	$marca_gabinete = $_POST['marcagabinete_text'];
	$Equipo->setMarcaequipo($marca_gabinete);

	// PROPIEDAD: PROCESADOR
	$marca_procesador = $_POST['marcaprocesador_text'];
	$capacidad_procesador = $_POST['inputRendimientoProcesador'];
	$procesador_final = $marca_procesador . " " . trim($capacidad_procesador);
	$Equipo->setProcesadorequipo($procesador_final);

	// PROPIEDAD: DISCO DURO
	$marca_hdd = $_POST['marcahdd_text'];
	$capacidad_hdd = str_replace(' ', '', $_POST['CapacidadHDD']);
	$capacidad_hdd = strtoupper($capacidad_hdd);
	$hdd_final = $marca_hdd . " " . trim($capacidad_hdd);
	$Equipo->setHddequipo($hdd_final);

	// PROPIEDAD: RAM
	$marca_ram = $_POST['marcaram_text'];
	$tipo_ram = $_POST['tiporam_text'];
	$capacidad_ram = $_POST['capacidadram_text'];
	$ram_final = $marca_ram . " " . $tipo_ram . " " . $capacidad_ram;
	$Equipo->setRamequipo($ram_final);

	// PROPIEDAD: MONITOR
	$marca_monitor = $_POST['marcamonitor_text'];
	$tamaño_monitor = $_POST['tamañomonitor_text'];
	$monitor_final = $marca_monitor . $tamaño_monitor;
	$Equipo->setMonitorequipo($monitor_final);

	// PROPIEDAD: SISTEMA OPERATIVO
	$sistema_operativo = $_POST['sistemaoperativo_text'];
	$version_sistema = $_POST['versionsistema_text'];
	$sistema_final = $sistema_operativo . " " . $version_sistema;
	$Equipo->setSoequipo($sistema_final);

	// PROPIEDAD: ARQUITECTURA
	$arquitectura = $_POST['inlineRadioOptions'];
	$Equipo->setArquitecturaequipo($arquitectura);

	// PROPIEDAD: OFFICE
	$version_office = $_POST['versionoffice_text'];
	$edicion_office = $_POST['edicionoffice_text'];
	$office_final = $version_office . $edicion_office;
	$Equipo->setOfficeequipo($office_final);

	// PROPIEDAD: ANTIGÜEDAD
	$Equipo->setAntiguedadequipo($_POST['AntiguedadEquipo']);

	$fecha = $_POST['FechaInEquipoM'];
	if ($fecha == 'Nuevo'){
		$Equipo->setFechaIngreso(date("Y-d-m H:i:s"));
	}else{
		$fechaBD = date ("Y-d-m H:i:s", strtotime($fecha));
		$Equipo->setFechaIngreso($fechaBD);
	}

	// PROPIEDAD: HISTORIAL MODIFICACIONES
	$Equipo->setModificacionequipo($_POST['ModificacionEquipo']);

	// REALIZAR CAMBIOS
	if ($ip == null || $capacidad_procesador == null || $fecha == null){
		echo "ERROR: Rellene todos los campos vacíos";
		exit();
	}else{
		$SWfecha = 0;
		if ($SWfecha == 0){
			$Equipo->modificarDatos($idEquipo);
			$SWfecha = $SWfecha+1;
		}

		if($SWfecha == 1){
			$Equipo->setFechaIngreso(date("Y-d-m H:i:s"));
			$Equipo->grabarLog();
			$SWfecha = 0;
		}
	}
	unset($Equipo);
}else if (isset($_POST['idEquipo']) && $_POST['accion'] =='eliminar') { //ELIMINAR EQUIPO
	$idEquipo = $_POST['idEquipo'];
	$Equipo = new Equipos;
	$Equipo->eliminarDatos($idEquipo);
	unset($Equipo);
}else{
	echo "ERROR: Rellene todos los campos vacíos";
}

?>