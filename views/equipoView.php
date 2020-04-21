<?php
$Equipo = new Equipos();
$datosEquipos = $Equipo->mostrarDatos();
if($datosEquipos){
    ?>
    <div class="table-section">
        <div class="table-responsive">
            <table id="tabla-equipos" class="table table-bordered table-striped w-auto small">
                <thead>
                    <tr>
                        <th style="display: none;">ID</th>
                        <th>IP</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th style="display: none;">Marca</th>
                        <th style="display: none;">Procesador</th>
                        <th style="display: none;">Ram</th>
                        <th style="display: none;">HDD</th>
                        <th style="display: none;">Monitor</th>
                        <th>Versión SO</th>
                        <th>Versión Office</th>
                        <th style="display: none;">Antigüedad</th>
                        <th style="display: none;">Fecha de adquisición<br>(dd/mm/aa)</th>
                        <th style="display: none;">Modificaciones</th>
                        <th>Detalles</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <form id="form-equipo">
                    <tbody>
                        <?php 
                        foreach ($datosEquipos as $Objeto) { 
                            ?>
                            <tr>
                                <!-- PROPIEDAD: ID -->
                                <td style="display: none;"><?php echo $Objeto->idEquipos;?></td>
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
                                <!-- PROPIEDAD: ESTADO -->
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
                                <td style="display: none;">
                                    <?php echo $Objeto->marca_equipos;?>
                                </td>
                                <!-- PROPIEDAD: PROCESADOR -->
                                <td style="display: none;">
                                    <?php echo $Objeto->procesador_equipos;?>
                                </td>
                                <!-- PROPIEDAD: RAM -->
                                <td style="display: none;">
                                    <?php echo $Objeto->ram_equipos;?>
                                </td>
                                <!-- PROPIEDAD: HDD -->
                                <td style="display: none;">
                                    <?php echo $Objeto->hdd_equipos;?>
                                </td>
                                <!-- PROPIEDAD: MONITOR -->
                                <td style="display: none;">
                                    <?php echo $Objeto->monitor_equipos;?>
                                </td>
                                <!-- PROPIEDAD: SISTEMA OPERATIVO + ARQUITECTURA -->
                                <td><?php echo $Objeto->so_equipos . " de " . $Objeto->arquitectura_equipos;?></td>
                                <!-- PROPIEDAD: OFFICE -->
                                <td><?php echo $Objeto->office_equipos;?></td>
                                <!-- PROPIEDAD: ANTIGÜEDAD -->
                                <td style="display: none;"><?php echo $Objeto->ant_equipos;?></td>
                                <!-- PROPIEDAD: FECHA ADQUISICIÓN -->
                                <?php 
                                $cadena = $Objeto->fechain_equipos;
                                $array = explode("-", $cadena);
                                $dia = $array[2];
                                $dia = trim(substr($dia, 0, 2));
                                $mes = $array[1];
                                $año = $array[0];
                                $fechafinal = $dia . "/" . $mes . "/" . $año;
                                ?>
                                <td style="display: none;"><?php echo $fechafinal;?></td>
                                <!-- PROPIEDAD: MODIFICACIONES -->
                                <td style="display: none;"><?php echo $Objeto->modificacion_equipos;?></td>
                                <td>
                                    <button type="button" class="btn btn-success btnVerEquipo" data-toggle="modal" data-target="#modalEquipoDetalle" value="<?php echo $Objeto->idEquipos;?>"><i class="far fa-eye"></i>
                                    </button>
                                </td>
                                <td><button type="button" class="btn btn-warning btnEditarEquipo" value="<?php echo $Objeto->idEquipos;?>"><i class="far fa-edit"></i></button></td>
                                <td><button type="button" class="btn btn-danger btnEliminarEquipo" value="<?php echo $Objeto->idEquipos;?>"><i class="far fa-trash-alt"></i></button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </form>
            </table>
        </div>
    </div>  

    <!-- -------------------------------------------->
    <!-- Modal DETALLE Equipo-->
    <div class="modal" id="modalEquipoDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="contentMyModal">

            </div>
        </div>
    </div>

    <!-- FORM MODIFICAR -->
    <div id="contentMyForm">

    </div>

<?php } ?>
