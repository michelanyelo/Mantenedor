<?php 
$equipoData = $_POST['idEquipo'];
require_once "../class/Conexion.php"; 
include "../class/Equipos.php";
$Equipos = new Equipos();
$data = $Equipos->mostrarDatosId($equipoData); 
?>

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Ver Detalles</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <table id="tabla-Equipos" class="table table-responsive table-bordered w-auto small">
        <thead class="thead thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">IP Equipo</th>
                <th scope="col">Tipo Equipo</th>
                <th scope="col">Estado</th>
                <th scope="col">Marca</th>
                <th scope="col">Procesador</th>
                <th scope="col">RAM</th>
                <th scope="col">HDD</th>
                <th scope="col">Monitor</th>
                <th scope="col">Versión SO</th>
                <th scope="col">Versión Office</th> 
                <th scope="col">Antigüedad</th>
                <th scope="col">Fecha de adquisición<br>(dd/mm/aa)</th>
                <th scope="col">Modificaciones</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <?php
            foreach ($data as $Objeto) { ?>
                <tr>
                    <!-- PROPIEDAD: ID -->
                    <td> <?php echo $Objeto->idEquipos;?></td>
                    <!-- PROPIEDAD: IP -->
                    <td> <?php echo $Objeto->ipEquipos;?></td>
                    <!-- PROPIEDAD: TIPO -->
                    <td> 
                       <?php 
                       $IDtipoequipo = $Objeto->idTipoEquipos;
                       switch($IDtipoequipo){
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
                    echo $Nombretipoequipo;
                    ?>
                </td>
                <!--PROPIEDAD: ESTADO -->
                <td>
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
                    echo $Nombreestadoequipo;  
                    ?>
                </td>
                <!-- PROPIEDAD: MARCA -->
                <td> <?php echo $Objeto->marca_equipos;?></td>
                <!-- PROPIEDAD: PROCESADOR -->
                <td> <?php echo $Objeto->procesador_equipos;?></td>
                <!-- PROPIEDAD: RAM -->
                <td> <?php echo $Objeto->ram_equipos;?></td>
                <!-- PROPIEDAD: HDD -->
                <td> <?php echo $Objeto->hdd_equipos;?></td>
                <!-- PROPIEDAD: MONITOR -->
                <td> <?php echo $Objeto->monitor_equipos;?></td>
                <!-- PROPIEDAD: SISTEMA OPERATIVO + ARQUITECTURA -->
                <td> <?php echo $Objeto->so_equipos . " de " . $Objeto->arquitectura_equipos;?></td>
                <!-- PROPIEDAD: OFFICE -->
                <td> <?php echo $Objeto->office_equipos;?></td>
                <!-- PROPIEDAD: ANTIGÜEDAD -->
                <td> <?php echo $Objeto->ant_equipos;?></td>
                <!-- PROPIEDAD: FECHA DE ADQUISICIÓN -->
                <?php 
                $cadena = $Objeto->fechain_equipos;
                $array = explode("-", $cadena);
                $dia = $array[2];
                $dia = trim(substr($dia, 0, 2));
                $mes = $array[1];
                $año = $array[0];
                $fechafinal = $dia . "/" . $mes . "/" . $año;
                ?>
                <td> <?php echo $fechafinal;?></td>
                <!-- PROPIEDAD: MODIFICACIONES -->
                <td> <?php echo $Objeto->modificacion_equipos;?></td>
            </tr>
        <?php } ?>
    </tbody>
</table> 
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
</div>