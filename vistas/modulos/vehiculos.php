<div class="content-wrapper">

    <section class="content-header">

        <div class="row">
            <div class="col-md-6">
                <h1>
                    Administrar Vehiculos
                </h1>
            </div>

            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li>
                    <li class="breadcrumb-item active">Administrar Vehiculos</li>
                </ol>
            </div>
        </div>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarVehiculo">
                    Agregar Vehiculo
                </button>

            </div>


            <div class="card-body">

                <table class="table table-bordered table-striped dt-responsive Data-Table" style="width:100%">

                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Propietario</th>
                            <th>Nro Placa</th>
                            <th>Marca</th>
                            <th>Año</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        $ListaVehi=ControladorVehiculo::ctrListar();
                        foreach($ListaVehi as $Key => $vehi){
                    ?>

                        <tr>
                            <td><?=($Key+1)?></td>
                            <td><?=$vehi["Nombre"]?> <?=$vehi["ApellidoPa"]?> <?=$vehi["ApellidoMa"]?></td>
                            <td><?=$vehi["Placa"]?></td>
                            <td><?=$vehi["Marca"]?></td>
                            <td><?=$vehi["Año"]?></td>
                            <td><?=$vehi["Tipo"]?></td>
                            <td>
                                <?php
                            if($vehi["Estado"]==="1"){
                                echo '<button class="btn btn-success btn-xs">Activo</button>';
                            }else{
                                echo '<button class="btn btn-danger btn-xs">Inactivo</button>';
                            }
                        ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>

                                    <button class="btn btn-danger" onclick="getBorrarUsu('<?=$vehi['Id']?>')"
                                        data-toggle="modal" data-target="#modalBorrar"><i
                                            class="fa fa-times"></i></button>
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
      Modal Agregar Vehiculo
=====================================================---->

<!-- Modal -->
<div class="modal fade" id="modalAgregarVehiculo" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form role="formulario" method="post">

                <!------------------------CABEZA DEL MODAL----------------->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h4 class="modal-title">Agregar Vehículo</h4>
                    <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-----------------------CUERPO DEL MODAL------------------>
                <div class="modal-body">
                    <p><span class="text-danger">* Casilla Obligatoria</span>



                        <!--INGRESAR PROPIETARIO-->
                    <div class="form-group ">
                        <label>Seleccione el Propietario<span class="text-danger">*</span></label>
                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fa fa-users"></i></span>
                            <select class="form-control input-lg" name="IngIdPropietario" required>
                                <option value="">Seleccione</option>
                                <?php 
                              $PropietarioLista=ControladorVehiculo::ctrListarPropietarios(); 
                              foreach($PropietarioLista as $Key => $Propi){
                              ?>
                                <option value="<?=$Propi["Id"]?>"><?=$Propi["ApellidoPa"]?> <?=$Propi["ApellidoMa"]?>
                                    <?=$Propi["Nombre"]?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!--INGRESAR PLACA-->
                    <div class="form-group">

                        <label>Ingrese Placa del Vehiculo <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fas fa-font"></i></span>
                            <input type="text" class="form-control input-lg" name="IngPlaca" required
                                placeholder="Ingresar Placa Vehicular">

                        </div>

                    </div>

                    <!--INGRESAR MARCA-->

                    <div class="form-group">

                        <label>Ingrese Marca <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fas fa-taxi"></i></span>
                            <input type="text" class="form-control input-lg" name="IngMarca"
                                placeholder="Ingrese la Marca">

                        </div>

                    </div>

                    <!--INGRESAR AÑO-->

                    <div class="form-group">

                        <label>Ingrese Año <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                            <input type="number" min="1900" max="2099" step="1" class="form-control input-lg" name="IngAño" placeholder="Ingrese el Año">

                        </div>

                    </div>

                    <!--ENTRADA PARA INGRESAR EL TIPO DE VEHICULO-->
                    <div class="form-group">

                        <label>Seleccione Tipo de Vehiculo <span class="text-danger">*</span></label>

                        <div class="input-group-prepend">
                            <span class="input-group-text "><i class="fas fa-bus-alt"></i></span>

                            <select class="form-control input-lg" name="IngTipo">
                                <option value="">Seleccionar Vehiculo</option>
                                <option value="Combi">Combi</option>
                                <option value="Coaster">Coaster</option>
                                <option value="Bus">Bus</option>
                            </select>
                        </div>

                    </div>
                </div>

                <!-------------------PIE DEL MODAL----------------->
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

                </div>

                <?php
              $obj = new ControladorVehiculo();
              $obj -> ctrAgregar();
          
          ?>

            </form>

        </div>

    </div>

</div>






<!-- Modal borrar-->
<div class="modal fade" id="modalBorrar" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <form role="form" method="post">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <br>
                    <h1><i class="fas fa-trash text-danger"></i></h1>
                    <br>
                    <h4>¿Desea eliminar el Vehiculo?</h4>
                    <input type="hidden" id="idBorrar" name="idBorrar" required>
                    <?php
                    $obj = new ControladorVehiculo();
                    $obj ->ctrBorrar(); 
                    ?>
                    <br>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-secondary mt-2" data-dismiss="modal">Cancelar</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-danger mt-2">Borrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>