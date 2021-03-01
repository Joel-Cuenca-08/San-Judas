<div class="content-wrapper">

    <section class="content-header">

        <div class="row">
            <div class="col-md-6">
                <h1>
                    Gestionar Personal Administrativo
                </h1>
            </div>

            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li>
                    <li class="breadcrumb-item active">Gestionar Personal Administrativo</li>
                </ol>
            </div>
        </div>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default card -->
        <div class="card">

            <div class="card-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAdministrativo">
                    Agregar Administrativo
                </button>

            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped dt-responsive Data-Table" style="width:100%">

                    <thead>
                        <tr>

                            <th style="width:10px">#</th>
                            <th>Persona</th>
                            <th>Nro Documento</th>
                            <th>Telefono</th>
                            <th>Cargo</th>
                            <th>Funcion</th>
                            <th>Sede</th>
                            <th>Periodo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        $ListaAdmi=ControladorAdministrativos::ctrListar();
                        foreach($ListaAdmi as $Key => $Admi){
                    ?>
                        <tr>
                            <td><?=($Key+1)?></td>
                            <td><?=$Admi["Nombre"]?> <?=$Admi["ApellidoPa"]?> <?=$Admi["ApellidoMa"]?></td>
                            <td><?=$Admi["NumeroDoc"]?></td>
                            <td><?=$Admi["Telefono"]?></td>
                            <td><?=$Admi["Cargo"]?></td>
                            <td><?=$Admi["Funcion"]?></td>
                            <td><?=$Admi["Sede"]?></td>
                            <td><?=$Admi["periodo"]?></td>
                            <td>
                                <?php
                            if($Admi["Estado"]==="1"){
                                echo '<button class="btn btn-success btn-xs">Activo</button>';
                            }else{
                                echo '<button class="btn btn-danger btn-xs">Inactivo</button>';
                            }
                        ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning" data-toggle="modal"
                                        data-target="#modalEditarAdministrativo"
                                        onclick="getAdministrativo(<?=$Admi['Id']?>,'<?=$Admi['IdPersona']?>','<?=$Admi['IdPeriodo']?>','<?=$Admi['IdSede']?>','<?=$Admi['Cargo']?>','<?=$Admi['Funcion']?>','<?=$Admi['Estado']?>')">
                                        <i class="fas fa-pencil-alt"></i></button>

                                    <button class="btn btn-danger" onclick="getBorrarUsu('<?=$Admi['Id']?>')"
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
      Modal Agregar Administrativos
=====================================================---->


<!-- Modal -->
<div class="modal fade" id="modalAgregarAdministrativo" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form role="formulario" method="post">

                <!------------------------CABEZA DEL MODAL----------------->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h4 class="modal-title">Agregar Administrativo</h4>

                    <button type="button" class="close  bg-danger" data-dismiss="modal">&times;</button>

                </div>

                <!-----------------------CUERPO DEL MODAL------------------>

                <!--INGRESAR PERSONA-->
                <div class="modal-body">
                    <p><span class="text-danger">* Casilla Obligatoria</span>
                    <div class="form-group ">
                        <label>Seleccione una Persona <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <select class="form-control input-lg" name="ingIdPersona" required>
                                <option value="">Seleccione</option>
                                <?php 
                          $PersonaLista=ControladorAdministrativos::ctrListarPersonaNoInscrita(); 
                          foreach($PersonaLista as $Key => $Per){
                          ?>
                                <option value="<?=$Per["Id"]?>"><?=$Per["Nombre"]?> <?=$Per["ApellidoPa"]?>
                                    <?=$Per["ApellidoMa"]?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!--INGRESAR SEDE-->

                    <div class="form-group ">
                        <label>Seleccione una Sede <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            <select class="form-control input-lg" name="ingIdSede" required>
                                <option value="">Seleccione</option>
                                <?php 
                          $SedeLista=ControladorAdministrativos::ctrListarSede(); 
                          foreach($SedeLista as $Key => $Sede){
                          ?>
                                <option value="<?=$Sede["Id"]?>"><?=$Sede["Sede"]?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <!--ENTRADA PARA INGRESAR EL CARGO-->
                    <div class="form-group">

                        <label>Ingrese Cargo <span class="text-danger">*</span></label>

                        <div class="input-group-prepend">
                            <span class="input-group-text "><i class="fa fa-users"></i></span>

                            <select class="form-control input-lg" name="IngCargo" required>
                                <option value="">Seleccionar Cargo</option>
                                <option>Administrador General</option>
                                <option>Administrador de Ruta</option>
                                <option>Secretariado</option>
                            </select>
                        </div>

                    </div>



                    <!--ENTRADA PARA INGRESAR LA FUNCION-->
                    <div class="form-group">

                        <label>Ingrese Funcion</label>
                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fas fa-font"></i></span>
                            <input type="text" class="form-control input-lg" name="IngFuncion"
                                placeholder="Detallar la funcion">

                        </div>

                    </div>

                    <!--INGRESAR PERIODO-->

                    <div class="form-group ">
                        <label>Seleccione un Periodo <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            <select class="form-control input-lg" name="ingPeriodo" required>
                                <option value="">Seleccione</option>
                                <?php 
                          $PeriodoLista=ControladorAdministrativos::ctrListarPeriodo(); 
                          foreach($PeriodoLista as $Key => $periodo){
                          ?>
                                <option value="<?=$periodo["Id"]?>"><?=$periodo["Nombre"]?></option>

                                <?php } ?>
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
              $obj=new ControladorAdministrativos();
              $obj->ctrAgregar();
          ?>

            </form>

        </div>

    </div>

</div>


<!--=====================================================
      Modal Editar Administrativos
=====================================================---->


<!-- Modal -->
<div class="modal fade" id="modalEditarAdministrativo" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form role="formulario" method="post">

                <!------------------------CABEZA DEL MODAL----------------->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h4 class="modal-title">Editar Administrativo</h4>

                    <button type="button" class="close  bg-danger" data-dismiss="modal">&times;</button>

                </div>

                <!-----------------------CUERPO DEL MODAL------------------>
                
                <!--INGRESAR PERSONA-->
                <div class="modal-body">
                    <input type="hidden" id="editId" name="editId" required>

                    <div class="form-group ">
                        <label>Seleccione una Persona</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <select class="form-control input-lg" id="editIdPersona" disabled>
                                <option value="">Seleccione</option>
                                <?php 
                          
                          foreach($ListaAdmi as $Key => $Per){
                          ?>
                                <option value="<?=$Per["IdPersona"]?>"><?=$Per["Nombre"]?> <?=$Per["ApellidoPa"]?>
                                    <?=$Per["ApellidoMa"]?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!--INGRESAR SEDE-->

                    <div class="form-group ">
                        <label>Sede</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            <select class="form-control input-lg" name="editIdSede" id="editIdSede" required>
                                <option value="">Seleccione</option>
                                <?php 
                          
                          foreach($SedeLista as $Key => $Sede){
                          ?>
                                <option value="<?=$Sede["Id"]?>"><?=$Sede["Sede"]?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <!--ENTRADA PARA INGRESAR EL CARGO-->
                    <div class="form-group">

                        <label>Cargo</label>

                        <div class="input-group-prepend">
                            <span class="input-group-text "><i class="fa fa-users"></i></span>

                            <select class="form-control input-lg" name="editCargo" id="editCargo" required>
                                <option value="">Seleccionar Cargo</option>
                                <option>Administrador General</option>
                                <option>Administrador de Ruta</option>
                                <option>Secretariado</option>
                            </select>
                        </div>

                    </div>



                    <!--ENTRADA PARA INGRESAR LA FUNCION-->
                    <div class="form-group">

                        <label>Funcion</label>
                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fas fa-font"></i></span>
                            <input type="text" class="form-control input-lg" name="editFuncion" id="editFuncion"
                                placeholder="Detallar la funcion">

                        </div>

                    </div>

                    <!--INGRESAR PERIODO-->

                    <div class="form-group ">
                        <label>Periodo</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            <select class="form-control input-lg" name="editIdPeriodo" id="editIdPeriodo">
                                <option>Seleccione</option>
                                <?php 
                                $PeriodoLista=ControladorAdministrativos::ctrListarPeriodo(); 
                                foreach($PeriodoLista as $Key => $periodo){
                                ?>
                                <option value="<?=$periodo["Id"]?>"><?=$periodo["Nombre"]?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!--ENTRADA PARA EDITAR ESTADO-->
                    <div class="form-group">

                        <label> Estado </label>

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
              $obj=new ControladorAdministrativos();
              $obj->ctrEditarAdmi();
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
                    <h4>¿Desea borrar Administrativo?</h4>
                    <input type="hidden" id="idBorrar" name="idBorrar" required>
                    <?php
                    $obj = new ControladorAdministrativos();
                    $obj ->ctrBorrarAdmi(); 
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