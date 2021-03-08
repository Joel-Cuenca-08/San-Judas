<div class="content-wrapper">

    <section class="content-header">

        <div class="row">
            <div class="col-md-6">
                <h1>
                    Administrar Propietarios
                </h1>
            </div>

            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li>
                    <li class="breadcrumb-item active">Administrar Propietarios</li>
                </ol>
            </div>
        </div>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPropietario">
                    Registrar Propietarios
                </button>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">

                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Persona</th>
                            <th>Nro Documento</th>
                            <th>Nro Tarjeta de Propiedad</th>

                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Telefono de Emergencia</th>
                            <th>Estado</th>
                            
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php 
                        $ListaPro=ControladorPropietario::ctrListar();
                        foreach($ListaPro as $Key => $Pro){
                    ?>
                        <tr>
                            <td><?=($Key+1)?></td>
                            <td><?=$Pro["Nombre"]?> <?=$Pro["ApellidoPa"]?> <?=$Pro["ApellidoMa"]?></td>
                            <td><?=$Pro["NumeroDoc"]?></td>
                            <td><?=$Pro["TarjetaPropiedad"]?></td>

                            <td><?=$Pro["Telefono"]?></td>
                            <td><?=$Pro["Correo"]?></td>
                            <td><?=$Pro["TelEmergencia"]?></td>
                            <td>
                                <?php
                            if($Pro["Estado"]==="1"){
                                echo '<button class="btn btn-success btn-xs">Activo</button>';
                            }else{
                                echo '<button class="btn btn-danger btn-xs">Inactivo</button>';
                            }
                        ?>
                            </td>
                            
                            <td>
                                
                                <div class="btn-group">
                                
                                <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarP"
                                        onclick="getPropietario(<?=$Pro['Id']?>,'<?=$Pro['IdPersona']?>','<?=$Pro['TarjetaPropiedad']?>','<?=$Pro['TelEmergencia']?>','<?=$Pro['Estado']?>')">
                                        <i class="fas fa-pencil-alt"></i></button>
                                <?php 
                                if($_SESSION["Perfil"]=="Administrador"){?>
                                <button class="btn btn-danger" onclick="getBorrarUsu(<?=$Pro['Id']?>)"
                                        data-toggle="modal" data-target="#modalBorrar"><i
                                        class="fa fa-times"></i></button><?php } ?>
                                </div>      
                                
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>


            </div>

        </div>


    </section>

</div>

<!--=====================================================
      Modal Agregar Propietarios
=====================================================---->


<!-- Modal -->
<div class="modal fade" id="modalAgregarPropietario" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form role="formulario" method="post">

                <!------------------------CABEZA DEL MODAL----------------->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h4 class="modal-title">Agregar Propietario</h4>
                    <button type="button" class="close bg-danger " data-dismiss="modal">&times;</button>



                </div>

                <!-----------------------CUERPO DEL MODAL------------------>
                <div class="modal-body">

                    <!--ENTRADA PARA INGRESAR PERSONA-->
                    <div class="form-group ">

                        <label>Seleccione una Persona <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <select class="form-control input-lg" name="ingIdPersona" required>
                                <option value="">Seleccione</option>
                                <?php 
                              $PersonaLista=ControladorPropietario::ctrListarPersonaNoInscrita(); 
                              foreach($PersonaLista as $Key => $Per){
                              ?>
                                <option value="<?=$Per["Id"]?>"><?=$Per["Nombre"]?> <?=$Per["ApellidoPa"]?>
                                    <?=$Per["ApellidoMa"]?>
                                </option>

                                <?php } ?>
                            </select>
                        </div>


                    </div>

                    <!--ENTRADA PARA INGRESAR LA TARJETA DE PROPIEDAD-->
                    <div class="form-group">

                        <label>Ingrese Tarjeta de Propiedad <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="far fa-credit-card"></i></span>
                            <input type="text" class="form-control input-lg" name="ingTarjetaPro"
                                placeholder="Ingresar Tarjeta de Propiedad" required>

                        </div>

                    </div>


                    <!--ENTRADA PARA INGRESAR TELEFONO DE EMERGENCIA-->

                    <div class="form-group">

                        <label>Ingrese Telefono o Celular de Emergencia</label>
                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                            <input type="text" class="form-control input-lg" pattern="[0-9]{7,10}" maxlength="9"
                                name="ingTel" placeholder="Ingresar Nro de Telefeno">

                        </div>

                    </div>

                </div>

                <!-------------------PIE DEL MODAL----------------->
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

                </div>

                <?php 
              $obj=new ControladorPropietario();
              $obj->ctrAgrear();
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
                    <h4>¿Desea borrar Propietario?</h4>
                    <input type="hidden" id="idBorrar" name="idBorrar" required>
                    <?php
                    $obj = new ControladorPropietario();
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





<!--=====================================================
      Modal Editar Propietarios
=====================================================---->


<!-- Modal -->
<div class="modal fade" id="modalEditarP" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form role="formulario" method="post">

                <!------------------------CABEZA DEL MODAL----------------->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h4 class="modal-title">Editar Propietario</h4>
                    <button type="button" class="close bg-danger " data-dismiss="modal">&times;</button>

                </div>

                <!-----------------------CUERPO DEL MODAL------------------>
                <div class="modal-body">

                    <!--ENTRADA PARA EDITAR PERSONA-->
                    <div class="form-group ">
                        <input type="hidden" id="editId" name="editId" required>
                        <label>Seleccione una Persona <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <select class="form-control input-lg" id="editIdPersona" disabled>
                                <option value="">Seleccione</option>
                                <?php 
                             
                              foreach($ListaPro as $Key => $Pro){
                              ?>
                                <option value="<?=$Pro["IdPersona"]?>"><?=$Pro["Nombre"]?> <?=$Pro["ApellidoPa"]?>
                                    <?=$Pro["ApellidoMa"]?></option>

                                <?php } ?>
                            </select>
                        </div>


                    </div>

                    <!--ENTRADA PARA EDITAR LA TARJETA DE PROPIEDAD-->
                    <div class="form-group">

                        <label>Ingrese Tarjeta de Propiedad <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="far fa-credit-card"></i></span>
                            <input type="text" class="form-control input-lg" name="editTarjeta" id="editTarjeta"
                                placeholder="Ingresar Tarjeta de Propiedad" required>

                        </div>

                    </div>

                    <!--ENTRADA PARA EDITAR TELEFONO DE EMERGENCIA-->

                    <div class="form-group">

                        <label>Ingrese Telefono o Celular de Emergencia</label>
                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                            <input type="text" class="form-control input-lg" pattern="[0-9]{7,10}" maxlength="9"
                                name="editTel" id="editTel" placeholder="Ingresar Nro de Telefeno">

                        </div>

                    </div>


                    <!--ENTRADA PARA EDITAR ESTADO-->
                    <div class="form-group">

                        <label> Estado <span class="text-danger">*</span></label>

                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>

                            <select class="form-control input-lg" name="editEstado" id="editEstado" required>
                                <option value="1">Activo</option>
                                <option value="0">Desactivo</option>
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
              $obj=new ControladorPropietario();
              $obj->ctrEditar();
          ?>

            </form>

        </div>

    </div>

</div>