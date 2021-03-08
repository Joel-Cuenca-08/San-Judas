<div class="content-wrapper">

    <section class="content-header">

        <div class="row">
            <div class="col-md-6">
                <h1>
                    Administrar Rutas
                </h1>
            </div>

            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li>
                    <li class="breadcrumb-item active">Administrar Rutas</li>
                </ol>
            </div>
        </div>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">

            <div class="card-header with-border">
            <?php if($_SESSION["Perfil"] == "Digitador"){
               echo '<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarRuta">
                    Registrar Ruta
                </button>';}?>
            </div>
            <div class="card-body">
                <label>Seleccione Sede:</label>
                <select class="form-control input-lg" name="ingConductor" disabled>
                    <option>Las Palmas</option>
                    <option>Centro de Lima</option>
                    <option>Las Palmas</option>

                </select>
                <br>
                <table class="table table-bordered table-striped table-sm dt-responsive Data-Table" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Conductor</th>
                            <th>Placa</th>
                            <th>Fecha</th>
                            <th>Registros</th>
                            <th>Ganancia</th>
                            <th>Observacion</th>
                            <th>Accion</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        $ListaRuta=ControladorRuta::ctrListar();
                        foreach($ListaRuta as $Key => $ruta){
                        ?>

                        <tr>

                            <td><?=($Key+1)?></td>
                            <td><?=$ruta["Conductor"]?></td>
                            <td><?=$ruta["Placa"]?></td>
                            <td><?=$ruta["Fecha"]?></td>
                            <td><?=$ruta["Detalle"]?></td>
                            <td>S/.<?=$ruta["Ganancia"]?></td>
                            <td><?=$ruta["Observacion"]?></td>
                            <td>
                                <div class="btn-group">
                                <?php if($_SESSION["Perfil"] == "Digitador"){?>
                                    <button class="btn-sm btn btn-primary" data-toggle="modal"
                                        data-target="#modalAgregarDetalleRuta" onclick="getRuta(<?=$ruta['Id']?>)"><i
                                            class="fas fa-plus-circle"></i></button><?php }?>
                                </div>
                                <div class="btn-group">
                                <?php if($_SESSION["Perfil"] == "Digitador"){?>
                                   <button type="button" class="btn-sm btn btn-danger" data-toggle="modal"
                                        data-target="#modalEditarRuta"
                                        onclick="getRutaCierre('<?=$ruta['Id']?>')">
                                        Cierre</button><?php } ?>
                                </div>
                            </td>
                            <?php } ?>
                        </tr>

                    </tbody>

                </table>


            </div>


        </div>


    </section>

</div>

<!--=====================================================
      Modal Agregar Ruta
=====================================================---->
<!-- The Modal -->
<div class="modal fade" id="modalAgregarRuta">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form role="form" method="post">

                <!------------------------CABEZA DEL MODAL----------------->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h4 class="modal-title">Registrar Ruta</h4>
                    <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>

                </div>

                <!-----------------------CUERPO DEL MODAL------------------>
                <div class="modal-body">
                    <p><span class="text-danger">* Casilla Obligatoria</span>

                    <div class="row">

                        <!--ENTRADA PARA SELECCIONAR CONDUCTOR-->
                        <div class="col-md-4">
                            <label>Seleccione Conductor <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <select class="form-control input-lg" name="ingConductor" required>
                                    <option>Seleccione Conductor</option>
                                    <?php 
                                    $ConductorLista=ControladorRuta::ctrListarConductor(); 
                                    foreach($ConductorLista as $Key => $Conduc){
                                    ?>
                                    <option value="<?=$Conduc["Id"]?>"> <?=$Conduc["Conductor"]?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>


                        <!--ENTRADA PARA SELECCIONAR ADMINISTRATIVO-->
                        <div class="col-md-4">
                            <label>Seleccione su Sede<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                <select class="form-control input-lg" name="ingAdministrativo" required>
                                    <?php 
                                    $AdministrativoLista=ControladorRuta::ctrListarAdministrativo(); 
                                    foreach($AdministrativoLista as $Key => $Admi){
                                        if($_SESSION["ID_PERSONA"]==$Admi["IdPersona"]){
                                    ?>
                                    <option value="<?=$Admi["Id"]?>"> <?=$Admi["Sede"]?></option>
                                    <?php }} ?>
                                </select>
                            </div>
                        </div>

                        <!--ENTRADA PARA SELECCIONAR VEHICULO-->
                        <div class="col-md-4">
                            <label>Seleccione Placa Vehicular<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-bus"></i></span>
                                <select class="form-control input-lg" name="ingPlaca" required>
                                    <option value="">Seleccione Vehiculo</option>
                                    <?php 
                                    $VehiculoLista=ControladorRuta::ctrListarVehiculo(); 
                                    foreach($VehiculoLista as $Key => $Vehi){
                                    ?>
                                    <option value="<?=$Vehi["Id"]?>"> <?=$Vehi["Placa"]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                    </div>

                </div>

                <!-------------------PIE DEL MODAL----------------->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <?php
                    $obj=new ControladorRuta();
                    $obj->ctrAgregar();
                    ?>
                </div>
            </form>

        </div>
    </div>
</div>

<!--=====================================================
      Modal Agregar DetalleRuta
=====================================================---->
<!-- The Modal -->
<div class="modal fade" id="modalAgregarDetalleRuta">

    <div class="modal-dialog ">

        <div class="modal-content">

            <form role="form" method="post">

                <!------------------------CABEZA DEL MODAL----------------->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h4 class="modal-title">Registrar Detalle de Ruta</h4>
                    <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>

                </div>

                <!-----------------------CUERPO DEL MODAL------------------>
                <div class="modal-body">
                    <p><span class="text-danger"> * Casilla Obligatoria</span>

                        <input type="hidden" id="editId" name="editId" required>
                        <input type="hidden" id="editEstado" name="editEstado" required>

                        <!--ENTRADA PARA INGRESAR SALIDA-->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Registro Hora<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <?php 
                        date_default_timezone_set("America/Lima");                    
                        ?>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-passport"></i></span>
                                        <input type="time" class="form-control input-lg" name="ingSalida"
                                            value="<?=date("H:i:s")?>" placeholder="Ingresar Hora de Salida" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tipo</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-passport"></i></span>
                                        <input type="text" class="form-control input-lg" id="editText" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-------------------PIE DEL MODAL----------------->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <?php
                    $obj=new ControladorRuta();
                    $obj->ctrAgregarDetalle();
                    ?>
                </div>
            </form>

        </div>
    </div>
</div>



<!--=====================================================
      Modal Editar Ruta
=====================================================---->
<div class="modal fade" id="modalEditarRuta">

    <div class="modal-dialog ">

        <div class="modal-content">

            <form role="form" method="post">

                <!------------------------CABEZA DEL MODAL----------------->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h4 class="modal-title">Registrar Cierre de Ruta</h4>
                    <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>

                </div>

                <!-----------------------CUERPO DEL MODAL------------------>
                <div class="modal-body">
                    <p><span class="text-danger"> * Casilla Obligatoria</span>

                        <input type="text" id="editIdCierre" name="editIdCierre" required>
                        <!--ENTRADA PARA INGRESAR GANANCIA-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Registro Ganancia<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                                    <input type="number" step="any" min="1" class="form-control input-lg"
                                        id="editGanancia" name="editGanancia" placeholder="Ingrese la ganancia"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--ENTRADA PARA INGRESAR OBSERVACION-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Observacion<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-comment-alt"></i></span>
                                    <input type="text" class="form-control input-lg" name="editObservacion"
                                        id="editObservacion" placeholder="Ingrese Observacion" required>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-------------------PIE DEL MODAL----------------->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <?php
                        $obj=new ControladorRuta();
                        $obj->ctrEditar();
                        ?>
                </div>
            </form>
        </div>
    </div>
</div>