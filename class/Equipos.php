<?php
session_start();
class Equipos{
	public $idequipo;
	public $ipequipo;
	public $tipoequipo;
	public $estadoequipo;
	public $marcaequipo;
	public $procesadorequipo;
	public $ramequipo;
	public $hddequipo;
	public $monitorequipo;
	public $arquitecturaequipo;
	public $soequipo;
	public $officeequipo;
	public $antiguedadequipo;
	public $fechainequipo;
	public $modificacionequipo;

	public function __construct(){
		$this->idequipo = '';
		$this->ipequipo = '';
		$this->tipoequipo = '';
		$this->estadoequipo = '';
		$this->marcaequipo = '';
		$this->procesadorequipo = '';
		$this->ramequipo = '';
		$this->hddequipo = '';
		$this->monitorequipo = '';
		$this->arquitecturaequipo = '';
		$this->soequipo = '';
		$this->officeequipo = '';
		$this->antiguedadequipo = '';
		$this->fechainequipo = '';
		$this->modificacionequipo = '';
	}

	public function setIdequipo($idequipo){
		$this->idequipo = $idequipo;
	}	

	public function getIdequipo(){
		return $this->idequipo;
	}

	public function setIpequipo($ipequipo){
		$this->ipequipo = $ipequipo;
	}	

	public function getIpequipo(){
		return $this->ipequipo;
	}

	public function setTipoequipo($tipoequipo){
		$this->tipoequipo = $tipoequipo;
	}

	public function getTipoequipo(){
		return $this->tipoequipo;
	}

	public function setEstadoequipo($estadoequipo){
		$this->estadoequipo = $estadoequipo;
	}

	public function getEstadoequipo(){
		return $this->estadoequipo;
	}

	public function setMarcaequipo($marcaequipo){
		$this->marcaequipo = $marcaequipo;
	}

	public function getMarcaequipo(){
		return $this->marcaequipo;
	}

	public function setProcesadorequipo($procesadorequipo){
		$this->procesadorequipo = $procesadorequipo;
	}

	public function getProcesadorequipo(){
		return $this->procesadorequipo;
	}

	public function setRamequipo($ramequipo){
		$this->ramequipo = $ramequipo;
	}

	public function getRamequipo(){
		return $this->ramequipo;
	}

	public function setHddequipo($hddequipo){
		$this->hddequipo = $hddequipo;
	}

	public function getHddequipo(){
		return $this->hddequipo;
	}

	public function setMonitorequipo($monitorequipo){
		$this->monitorequipo = $monitorequipo;
	}

	public function getMonitorequipo(){
		return $this->monitorequipo;
	}

	public function setArquitecturaequipo($arquitecturaequipo){
		$this->arquitecturaequipo = $arquitecturaequipo;
	}

	public function getArquitecturaequipo(){
		return $this->arquitecturaequipo;
	}

	public function setSoequipo($soequipo){
		$this->soequipo = $soequipo;
	}

	public function getSoequipo(){
		return $this->soequipo;
	}

	public function setOfficeequipo($officeequipo){
		$this->officeequipo = $officeequipo;
	}

	public function getOfficeequipo(){
		return $this->officeequipo;
	}

	public function setAntiguedadequipo($antiguedadequipo){
		$this->antiguedadequipo = $antiguedadequipo;
	}

	public function getAntiguedadequipo(){
		return $this->antiguedadequipo;
	}

	public function setFechaIngreso($fechainequipo){
		$this->fechainequipo = $fechainequipo;
	}

	public function getFechaIngreso(){
		return $this->fechainequipo;
	}

	public function setModificacionequipo($modificacionequipo){
		$this->modificacionequipo = $modificacionequipo;
	}

	public function getModificacionequipo(){
		return $this->modificacionequipo;
	}

	// RELACION CLASE - BASE DE DATOS

	public function mostrarDatos(){
		global $conn;
		try{
			$sql = "SELECT * FROM equipos ORDER BY idEquipos ASC";
			$resultado = $conn->query($sql);
			if($resultado->num_rows > 0){
				$objetos = new arrayobject();
				while($fila = $resultado->fetch_object()){
					$objetos[] = $fila;
				}
			}
			return $objetos;	
		}catch(Exception $e){
			echo "Error" . $e->getMessage() . "<br>";
		}
	}

	public function mostrarDatosId($id_equipo){
		global $conn;
		try{
			$sql = "SELECT * FROM equipos WHERE idEquipos = '$id_equipo'";
			$resultado = $conn->query($sql);
			if($resultado->num_rows> 0){
				$objetos = new arrayobject();
				while($fila = $resultado->fetch_object()){
					$objetos[] = $fila;
				}
			}
			return $objetos;
		}catch(Exception $e){
			echo "Error" . $e->getMessage() . "<br>";
		}
	}

	public function mostrarTipo(){
		global $conn;
		try{
			$sql = "SELECT * from dic_tipo";
			$resultado = $conn->query($sql);
			if($resultado->num_rows > 0){
				$objetos = new arrayobject();
				while($fila = $resultado->fetch_object()){
					$objetos[] = $fila;
				}
			}
			return $objetos;
		}catch(Exception $e){
			echo "Error" . $e->getMessage() . "<br>";
		}
	}

	public function mostrarEstado(){
		global $conn;
		try{
			$sql = "SELECT * from dic_estado";
			$resultado = $conn->query($sql);
			if($resultado->num_rows > 0){
				$objetos = new arrayobject();
				while($fila = $resultado->fetch_object()){
					$objetos[] = $fila;
				}
			}
			return $objetos;
		}catch(Exception $e){
			echo "Error" . $e->getMessage() . "<br>";
		}
	}

	public function mostrarDicMarcas(){
		global $conn;
		try{
			$sql = "SELECT * from dic_marcas ORDER BY nombre_dicmarcas ASC";
			$resultado = $conn->query($sql);
			if($resultado->num_rows > 0){
				$objetos = new arrayobject();
				while($fila = $resultado->fetch_object()){
					$objetos[] = $fila;
				}
			}
			return $objetos;
		}catch(Exception $e){
			echo "Error" . $e->getMessage() . "<br>";
		}
	}

	public function mostrarDicSO(){
		global $conn;
		try{
			$sql = "SELECT * from dic_so";
			$resultado = $conn->query($sql);
			if($resultado->num_rows > 0){
				$objetos = new arrayobject();
				while($fila = $resultado->fetch_object()){
					$objetos[] = $fila;
				}
			}
			return $objetos;
		}catch(Exception $e){
			echo "Error" . $e->getMessage() . "<br>";
		}
	}

	public function mostrarDicOffice(){
		global $conn;
		try{
			$sql = "SELECT * from dic_office";
			$resultado = $conn->query($sql);
			if($resultado->num_rows > 0){
				$objetos = new arrayobject();
				while($fila = $resultado->fetch_object()){
					$objetos[] = $fila;
				}
			}
			return $objetos;
		}catch(Exception $e){
			echo "Error" . $e->getMessage() . "<br>";
		}
	}

	public function grabarDatos(){ 
		$ip_equipo = $this->getIpequipo();
		$tipo_equipo = $this->getTipoequipo();
		$estado_equipo = $this->getEstadoequipo();
		$marca_equipo = $this->getMarcaequipo();
		$procesaror_equipo = $this->getProcesadorequipo();
		$ram_equipo = $this->getRamequipo();
		$hdd_equipo = $this->getHddequipo();
		$monitor_equipo = $this->getMonitorequipo();
		$arquitectura_equipo = $this->getArquitecturaequipo();
		$sistema_equipo = $this->getSoequipo();
		$office_equipo = $this->getOfficeequipo();
		$ant_equipo = $this->getAntiguedadequipo();
		$fechain_equipo = $this->getFechaIngreso();
		global $conn;
		try{
			$sql = "INSERT INTO equipos (ipEquipos, idTipoEquipos, idEstadoEquipos, marca_equipos, procesador_equipos, ram_equipos, hdd_equipos, monitor_equipos, arquitectura_equipos, so_equipos, office_equipos, ant_equipos, fechain_equipos) VALUES ('".$ip_equipo."', '".$tipo_equipo."', '".$estado_equipo."',  '".$marca_equipo."', '".$procesaror_equipo."', '".$ram_equipo."', '".$hdd_equipo."', '".$monitor_equipo."', '".$arquitectura_equipo."', '".$sistema_equipo."', '".$office_equipo."', '".$ant_equipo."', '".$fechain_equipo."')";
			$conn->query($sql);
		}catch(Exception $e){
			echo "Error" . $e->getMessage() . "<br>";
		}
	}

	public function grabarLog(){
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
			$ip_local = $_SERVER['HTTP_CLIENT_IP'];
		}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
			$ip_local = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip_local = $_SERVER['REMOTE_ADDR'];
		}
		
		$ip_equipo = $this->getIpequipo();
		$fechain_equipo = $this->getFechaIngreso();
		$modificacion_equipo = $this->getModificacionequipo();
		global $conn;
		try{
			$sql_log = "INSERT INTO equipos_log (ipLocal, ipEquipos, fechain_equipos, modificacion_equipos) VALUES ('".$ip_local."', '".$ip_equipo."', now(), '".$modificacion_equipo."')";
			$conn->query($sql_log);
		}catch(Exception $e){
			echo "Error" . $e->getMessage() . "<br>";
		}
	}

	public function modificarDatos($id_equipo){
		$ip_equipo = $this->getIpequipo();
		$tipo_equipo = $this->getTipoequipo();
		$estado_equipo = $this->getEstadoequipo();
		$marca_equipo = $this->getMarcaequipo();
		$procesaror_equipo = $this->getProcesadorequipo();
		$ram_equipo = $this->getRamequipo();
		$hdd_equipo = $this->getHddequipo();
		$monitor_equipo = $this->getMonitorequipo();
		$arquitectura_equipo = $this->getArquitecturaequipo();
		$sistema_equipo = $this->getSoequipo();
		$office_equipo = $this->getOfficeequipo();
		$ant_equipo = $this->getAntiguedadequipo();
		$fechain_equipo = $this->getFechaIngreso();
		$modificacion_equipo = $this->getModificacionequipo();

		global $conn;
		try{
			$sql = "UPDATE equipos SET ipEquipos = '$ip_equipo', idTipoEquipos = '$tipo_equipo', idEstadoEquipos = '$estado_equipo', marca_equipos = '$marca_equipo', procesador_equipos = '$procesaror_equipo', ram_equipos = '$ram_equipo', hdd_equipos = '$hdd_equipo', monitor_equipos = '$monitor_equipo', arquitectura_equipos = '$arquitectura_equipo', so_equipos = '$sistema_equipo', office_equipos = '$office_equipo', ant_equipos = '$ant_equipo', fechain_equipos = '$fechain_equipo', modificacion_equipos = '$modificacion_equipo' WHERE idEquipos = '$id_equipo'";
			$conn->query($sql);
		}catch(Exception $e){
			echo "Error" . $e->getMessage() . "<br>";
		}
	}

	public function eliminarDatos($id_equipo){
		global $conn;
		try{
			$sql = "DELETE FROM equipos WHERE idEquipos = '$id_equipo'";
			$conn->query($sql);
		}catch(Exception $e){
			echo "Error" . $e->getMessage() . "<br>";
		}
	}
}
?>