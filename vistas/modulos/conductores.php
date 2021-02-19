<div class="content-wrapper">

    <section class="content-header">

        <div class="row">
            <div class="col-md-6">
                <h1>
                    Administrar Conductores
                </h1>
            </div>

            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li>
                    <li class="breadcrumb-item active">Administrar Conductores</li>
                </ol>
            </div>
        </div>


    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarConductor">
                    Agregar Conductor
                </button>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">

                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Persona</th>
                            <th>Nro Documento</th>
                            <th>Telefono</th>
                            <th>Categoría</th>
                            <th>Nro de Licencia</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php 
                    $ListaCon=ControladorConductor::ctrListar();
                    foreach($ListaCon as $Key => $Con){
                ?>
                        <tr>
                            <td><?=($Key+1)?></td>
                            <td><?=$Con["Nombre"]?> <?=$Con["ApellidoPa"]?> <?=$Con["ApellidoMa"]?></td>
                            <td><?=$Con["IdPersona"]?></td>
                            <td><?=$Con["Telefono"]?></td>
                            <td><?=$Con["CatLicencia"]?></td>
                            <td><?=$Con["NroLicencia"]?></td>
                            <td>
                                <?php
                            if($Con["Estado"]==="1"){
                                echo '<button class="btn btn-success btn-xs">Activo</button>';
                            }else{
                                echo '<button class="btn btn-danger btn-xs">Inactivo</button>';
                            }
                        ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning"  data-toggle="modal" data-target="#modalEditarConductor" 
                                    onclick="getConductor(<?=$Con['Id']?>,'<?=$Con['IdPersona']?>','<?=$Con['NroLicencia']?>','<?=$Con['CatLicencia']?>','<?=$Con['Estado']?>')">
                                    <i class="fas fa-pencil-alt"></i></button>

                                    <button class="btn btn-danger" onclick="getBorrarUsu(<?=$Con['Id']?>)"
                                        data-toggle="modal" data-target="#modalBorrar"><i
                                            class="fa fa-times"></i></button>
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
      Modal Agregar Conductores
=====================================================---->


<!-- Modal -->
<div class="modal fade" id="modalAgregarConductor" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form role="formulario" method="post">

                <!------------------------CABEZA DEL MODAL----------------->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h4 class="modal-title">Agregar Conductor</h4>
                    <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>



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
                              $PersonaLista=ControladorConductor::mdlListarPersonaNoInscrita(); 
                              foreach($PersonaLista as $Key => $Per){
                              ?>
                                <option value="<?=$Per["Id"]?>"><?=$Per["ApellidoPa"]?> <?=$Per["ApellidoMa"]?>
                                    <?=$Per["Nombre"]?></option>

                                <?php } ?>
                            </select>
                        </div>


                    </div>

                    <!--ENTRADA PARA INGRESAR LA CATEGORIA-->
                    <div class="form-group">

                        <label>Ingrese Categoria de Licencia <span class="text-danger">*</span></label>

                        <div class="input-group-prepend">
                            <span class="input-group-text "><i class="fa fa-users"></i></span>

                            <select class="form-control input-lg" name="ingCatLicencia">
                                <option value="">Seleccionar Categoria</option>
                                <option>A-IIa</option>
                                <option>A-IIb</option>
                                <option>A-IIIa</option>
                                <option>A-IIIb</option>
                            </select>
                        </div>

                    </div>

                    <!--ENTRADA PARA INGRESAR LICENCIA-->

                    <div class="form-group">

                        <label>Ingrese Licencia <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control input-lg" name="ingNroLicencia"
                                placeholder="Ingresar Nro de Licencia" required>

                        </div>

                    </div>

                </div>

                <!-------------------PIE DEL MODAL----------------->
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

                </div>

                <?php 
              $obj=new ControladorConductor();
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
                    <h4>¿Desea borrar Conductor?</h4>
                    <input type="hidden" id="idBorrar" name="idBorrar" required>
                    <?php
                    $obj = new ControladorConductor();
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
      Modal Editar Conductores
=====================================================---->


<!-- Modal -->
<div class="modal fade" id="modalEditarConductor" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form role="formulario" method="post">

                <!------------------------CABEZA DEL MODAL----------------->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h4 class="modal-title">Editar Conductor</h4>
                    <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>



                </div>

                <!-----------------------CUERPO DEL MODAL------------------>
                <div class="modal-body">

                    <!--ENTRADA PARA EDITAR PERSONA-->
                    <div class="form-group ">
                        <input type="hidden" id="editId" name="editId" required>

                        <label>Seleccione una Persona <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <select class="form-control input-lg" ID="editIdPersona" disabled>
                                <option value="">Seleccione</option>
                                <?php 
                              
                              foreach($ListaCon as $Key => $Per){
                              ?>
                                <option value="<?=$Per["IdPersona"]?>"> <?=$Per["Nombre"]?> <?=$Per["ApellidoPa"]?> 
                                <?=$Per["ApellidoMa"]?> </option>

                                <?php } ?>
                            </select>
                        </div>


                    </div>

                    <!--ENTRADA PARA EDITAR LA CATEGORIA-->
                    <div class="form-group">

                        <label>Ingrese Categoria de Licencia <span class="text-danger">*</span></label>

                        <div class="input-group-prepend">
                            <span class="input-group-text "><i class="fa fa-users"></i></span>

                            <select class="form-control input-lg" name="editCatLicencia" id="editCatLicencia">
                                <option value="">Seleccionar Categoria</option>
                                <option>A-IIa</option>
                                <option>A-IIb</option>
                                <option>A-IIIa</option>
                                <option>A-IIIb</option>
                            </select>
                        </div>

                    </div>

                    <!--ENTRADA PARA EDITAR LICENCIA-->

                    <div class="form-group">

                        <label>Ingrese Licencia <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control input-lg" name="editLicencia" id="editLicencia"
                                placeholder="Ingresar Nro de Licencia" required>

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
              $obj=new ControladorConductor();
              $obj->ctrEditar();
          ?>

            </form>

        </div>

    </div>

</div>