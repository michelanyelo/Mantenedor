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
                <th scope="col">Arquitectura</th>
                <th scope="col">Versión Office</th>  
            </tr>
        </thead>
        <tbody id="table-body">
            <?php
            foreach ($data as $Objeto) { ?>
                <tr>
                    <td class="category-idequipo"> <?php echo $Objeto->idEquipos;?></td>
                    <td class="category-ipequipo"> <?php echo $Objeto->ipEquipos;?></td>
                    <td class="category-tipoequipo"> 
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
                <td class="category-estadoequipo">
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
                <td class="category-marcaoequipo"> <?php echo $Objeto->marca_equipos;?></td>
                <td class="category-procesadoroequipo"> <?php echo $Objeto->procesador_equipos;?></td>
                <td class="category-ramequipo"> <?php echo $Objeto->ram_equipos;?></td>
                <td class="category-hddequipo"> <?php echo $Objeto->hdd_equipos;?></td>
                <td class="category-monitorequipo"> <?php echo $Objeto->monitor_equipos;?></td>
                <td class="category-sistemaequipo"> <?php echo $Objeto->so_equipos;?></td>
                <td class="category-arquitecturaequipo"> <?php echo $Objeto->arquitectura_equipos;?></td>
                <td class="category-officeequipo"> <?php echo $Objeto->office_equipos;?></td>
            </tr>
        <?php } ?>
    </tbody>
</table> 
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
</div>