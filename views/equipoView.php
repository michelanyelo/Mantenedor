<?php
$Equipo = new Equipos();
$datosEquipos = $Equipo->mostrarDatos();
if($datosEquipos){
    ?>
    <div class="table-section">
        <div class="table-responsive">
            <table id="tabla-equipos" class="table table-bordered w-auto small">
                <thead class="thead thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">IP Equipo</th>
                        <th scope="col">Tipo Equipo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Versión SO</th>
                        <th scope="col">Arquitectura</th>
                        <th scope="col">Versión Office</th>
                        <th scope="col">Detalles</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                        
                    </tr>
                </thead>
                <form id="form-equipo">
                    <tbody id="table-body">
                        <?php 
                        foreach ($datosEquipos as $Objeto) { 
                            ?>
                            <tr>
                                <td class="category-idequipo"><?php echo $Objeto->idEquipos;?></td>
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
                                <td class="category-sistemaequipo"> <?php echo $Objeto->so_equipos;?></td>
                                <td class="category-arquitecturaequipo"> <?php echo $Objeto->arquitectura_equipos;?>
                            </td>
                            <td class="category-officeequipo"> <?php echo $Objeto->office_equipos;?></td>
                            <td>
                                <button type="button" class="btn btn-success btnVerEquipo" data-toggle="modal" data-target="#modalEquipoDetalle" value="<?php echo $Objeto->idEquipos?>"><i class="far fa-eye"></i>
                                </button>
                            </td>
                            <td><button type="button" class="btn btn-warning btnEditarEquipo" value="<?php echo $Objeto->idEquipos?>"><i class="far fa-edit"></i></button></td>
                            <td><button type="button" class="btn btn-danger btnEliminarEquipo" value="<?php echo $Objeto->idEquipos?>"><i class="far fa-trash-alt"></i></button></td>
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


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".btnVerEquipo").on('click',function(){
            var idEquipo = $(this).val();
            $("#contentMyModal").load("views/equipodetallesView.php",{idEquipo:idEquipo});
        });
        $(".btnEditarEquipo").on('click',function(){
            $("#tabla-equipos").hide();
            var idEquipo = $(this).val();
            $("#contentMyForm").load("views/equipomodificarView.php",{idEquipo:idEquipo});
        });
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
<?php } ?>