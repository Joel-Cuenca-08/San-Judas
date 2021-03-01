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

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarRuta">
                    Registrar Ruta
                </button>
            </div>



            <div class="card-body">

                <table class="table table-bordered table-striped dt-responsive Data-Table" style="width:100%">

                    <thead>
                        <tr>

                            <th style="width:10px">#</th>
                            <th>Conductor</th>
                            <th>Placa</th>
                            <th>Fecha</th>
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
                            <td><?=$ruta["Ganancia"]?></td>
                            <td><?=$ruta["Vuelta"]?></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#modalAgregarDetalleRuta" onclick="getRuta('<?=$ruta['Id']?>')"><i
                                            class="fas fa-plus-circle"></i></button>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-warning" data-toggle="modal"
                                        data-target="#modalListarDetalleRuta" onclick="getRuta('<?=$ruta['Id']?>')"><i
                                            class="fas fa-eye"></i></button>
                                            
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
                                <span class="input-group-text"><i class="fas fa-passport"></i></span>
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
                            <label>Seleccione su Nombre<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-passport"></i></span>
                                <select class="form-control input-lg" name="ingAdministrativo" required>
                                    <option>Seleccione Nombre</option>
                                    <?php 
                                    $AdministrativoLista=ControladorRuta::ctrListarAdministrativo(); 
                                    foreach($AdministrativoLista as $Key => $Admi){
                                    ?>
                                    <option value="<?=$Admi["Id"]?>"> <?=$Admi["Administrativo"]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <!--ENTRADA PARA SELECCIONAR VEHICULO-->
                        <div class="col-md-4">
                            <label>Seleccione Placa Vehicular<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-passport"></i></span>
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


                    <div class="row">

                        <!--ENTRADA PARA INGRESAR FECHA-->
                        <div class="col-md-4">
                            <label>Ingrese Fecha<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-passport"></i></span>
                                    <input type="date" class="form-control input-lg" name="ingFecha"
                                        placeholder="Ingresar Fecha" required>
                                </div>
                            </div>
                        </div>

                        <!--ENTRADA PARA INGRESAR GANANCIA-->
                        <div class="col-md-4">
                            <label>Ingrese Ganancia</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-passport"></i></span>
                                    <input type="number" step="any" min="0" class="form-control input-lg"
                                        name="ingGanancia" placeholder="Ingresar Ganancia" disabled>
                                </div>
                            </div>
                        </div>

                        <!--ENTRADA PARA SELECCIONAR VUELTA-->
                        <div class="col-md-4">
                            <label>Ingrese vuelta<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">

                                <select class="form-control input-lg" name="ingVuelta" required>
                                    <option>Seleccione Nro de Vuelta</option>
                                    <option>V1</option>
                                    <option>V2</option>
                                    <option>V3</option>
                                    <option>V4</option>
                                    <option>V5</option>
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
                    <p><span class="text-danger">* Casilla Obligatoria</span>

                        <input type="hidden" id="editId" name="editId" required>

                        <!--ENTRADA PARA INGRESAR SALIDA-->
                    <div class="form-group">
                        <label>Ingrese Hora Salida<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-passport"></i></span>
                                <input type="time" class="form-control input-lg" name="ingSalida"
                                    placeholder="Ingresar Hora de Salida" required>
                            </div>
                        </div>
                    </div>

                    <!--ENTRADA PARA INGRESAR LLEGADA-->
                    <div class="form-group">
                        <label>Ingrese Hora Llegada</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-passport"></i></span>
                                <input type="time" class="form-control input-lg" name="ingLlegada"
                                    placeholder="Ingresar Hora de Llegada" disabled>
                            </div>
                        </div>
                    </div>

                    <!--ENTRADA PARA INGRESAR GANANCIA-->
                    <div class="form-group">
                        <label>Ingrese Ganancia</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-passport"></i></span>
                                <input type="number" step="any" min="0" class="form-control input-lg" name="ingGanancia"
                                    placeholder="Ingresar Ganancia" disabled>
                            </div>
                        </div>
                    </div>

                    <!--ENTRADA PARA INGRESAR OBSERVACION-->
                    <div class="form-group">
                        <label>Ingrese Observacion</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-passport"></i></span>
                                <input type="text" class="form-control input-lg" name="ingobservacion"
                                    placeholder="Ingresar Observacion" disabled>
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
      Modal Listar Detalle Ruta
=====================================================---->
<div class="modal fade" id="modalListarDetalleRuta">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <!------------------------CABEZA DEL MODAL----------------->
            <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Lista Detalle Ruta</h4>
                <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>
            </div>
            <!-----------------------CUERPO DEL MODAL------------------>
            <div class="modal-body">

                <table class="table table-bordered table-striped dt-responsive Data-Table" style="width:100%">

                    <thead>
                        <tr>

                            <th style="width:10px">#</th>
                            <th>Id Ruta</th>
                            <th>Hora de Salida</th>
                            <th>Hora de Llegada</th>
                            <th>Ingreso</th>
                            <th>Observacion</th>
                            <th>Accion</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php 
                                $ListaDetalle=ControladorRuta::ctrListarDetalleRuta();
                                foreach($ListaDetalle as $Key => $detalle){
                                ?>

                        <tr>

                            <td><?=($Key+1)?></td>
                            <td><?=$detalle["IdRuta"]?></td>
                            <td><?=$detalle["HoraSalida"]?></td>
                            <td><?=$detalle["HoraLlegada"]?></td>
                            <td><?=$detalle["Ingreso"]?></td>
                            <td><?=$detalle["Observacion"]?></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                                </div>

                            </td>

                            <?php } ?>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>