<div class="content-wrapper">
    <section class="content-header">

        <div class="row">
            <div class="col-md-6">
                <h1>
                    Administrar Usuarios
                </h1>
            </div>

            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li>
                    <li class="breadcrumb-item active">Administrar Usuarios</li>
                </ol>
            </div>
        </div>

    </section>
    <section class="content">
        <div class="card">
            <div class="card-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
                    Agregar Usuario
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped  dt-responsive tablas" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nro Documento</th>
                            <th>Persona</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                          $ListaUsuario=ControladorUsuarios::ctrListar(null);
                          foreach($ListaUsuario as $Key => $Usu){
                          ?>
                        <tr>
                            <td><?=($Key+1)?></td>
                            <td><?=$Usu["NumeroDoc"]?></td>
                            <td><?=$Usu["Nombre"]?> <?=$Usu["ApellidoPa"]?> <?=$Usu["ApellidoMa"]?></td>
                            <td><?=$Usu["Usuario"]?></td>
                            <td><?=$Usu["Password"]?></td>
                            <td><?=$Usu["Perfil"]?></td>
                            <td>
                                <?php
                            if($Usu["Estado"]==="1"){
                                echo '<button class="btn btn-success btn-xs">Activo</button>';
                            }else{
                                echo '<button class="btn btn-danger btn-xs">Inactivo</button>';
                            }
                            ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditar"
                                        onclick="getUsuario(<?=$Usu['Id']?>,'<?=$Usu['IdPersona']?>','<?=$Usu['Usuario']?>','<?=$Usu['Perfil']?>','<?=$Usu['Estado']?>')"><i
                                            class="fas fa-pencil-alt"></i></button>
                                    <button class="btn btn-danger" onclick="getBorrarUsu(<?=$Usu['Id']?>)"
                                        data-toggle="modal" data-target="#modalBorrar" disabled><i
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
      Modal Agregar Usuario
=====================================================---->


<!-- Modal -->
<div class="modal fade" id="modalAgregarUsuario" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form role="form" method="post">

                <!------------------------CABEZA DEL MODAL----------------->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h4 class="modal-title">Agregar Usuario</h4>
                    <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-----------------------CUERPO DEL MODAL------------------>
                <div class="modal-body">
                    <p><span class="text-danger">* Casilla Obligatoria</span>

                        <!--ENTRADA PARA INGRESAR PERSONA-->
                    <div class="form-group ">

                        <label>Seleccione una Persona <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <select class="form-control input-lg" name="ingIdPersona" required>
                                <option value="">Seleccione</option>
                                <?php 
                          $PersonaLista=ControladorUsuarios::MdlListarPersonaNoInscrita(); 
                          foreach($PersonaLista as $Key => $Per){
                          ?>
                                <option value="<?=$Per["IdPersona"]?>"><?=$Per["ApellidoPa"]?> <?=$Per["ApellidoMa"]?>
                                    <?=$Per["Nombre"]?></option>

                                <?php } ?>
                            </select>
                        </div>


                    </div>

                    <!--ENTRADA PARA INGRESAR USUARIO-->

                    <div class="form-group">



                        <label>Ingrese Usuario <span class="text-danger">*</span></label>

                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control input-lg" name="ingUsuario"
                                placeholder="Ingresar Usuario" required>

                        </div>

                    </div>


                    <!--ENTRADA PARA INGRESAR CONTRASEÑA-->

                    <div class="form-group">

                        <label>Ingrese Contraseña <span class="text-danger">*</span></label>


                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                            <input type="password" class="form-control input-lg" name="ingPass"
                                placeholder="Ingresar Contraseña" required>
                        </div>


                    </div>




                    <!--ENTRADA PARA INGRESAR PERFIL-->
                    <div class="form-group">

                        <label>Ingrese Perfil <span class="text-danger">*</span></label>

                        <div class="input-group-prepend">
                            <span class="input-group-text "><i class="fa fa-users"></i></span>

                            <select class="form-control input-lg" name="ingPerfil">
                                <option value="">Seleccionar Perfil</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Digitador">Digitador</option>
                            </select>
                        </div>

                    </div>

                </div>

                <!-------------------PIE DEL MODAL----------------->
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <?php 
              $obj=new ControladorUsuarios();
              $obj->ctrAgrear();
              ?>
                </div>

            </form>

        </div>

    </div>

</div>

<!--=====================================================
      Modal Editar Usuario
=====================================================---->


<!-- Modal -->
<div class="modal fade" id="modalEditar" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form role="form" method="post">

                <!------------------------CABEZA DEL MODAL----------------->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Editar Usuario</h4>
                    <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>
                    


                </div>

                <!-----------------------CUERPO DEL MODAL------------------>
                <div class="modal-body">
                    <p><span class="text-danger">* Casilla Obligatoria</span>

                        <!--ENTRADA PARA EDITAR PERSONA-->
                    <div class="form-group ">


                        <input type="hidden" id="editId" name="editId" required>

                        <label>Persona <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <select class="form-control input-lg" id="editPersona" disabled>
                                <?php  
                                foreach($ListaUsuario as $Key => $Per){
                                ?>
                                <option value="<?=$Per["IdPersona"]?>"><?=$Per["IdPersona"]?> - <?=$Per["ApellidoPa"]?>
                                    <?=$Per["ApellidoMa"]?>
                                    <?=$Per["Nombre"]?></option>

                                <?php } ?>
                            </select>
                        </div>


                    </div>

                    <!--ENTRADA PARA EDITAR USUARIO-->

                    <div class="form-group">



                        <label> Usuario <span class="text-danger">*</span></label>

                        <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control input-lg" id="editUsuario" name="editUsuario"
                                required>

                        </div>

                    </div>


                    <!--ENTRADA PARA EDITAR CONTRASEÑA-->

                    <div class="form-group">
                        <label> Contraseña <span class="text-danger">(opcional)</span></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                            <input type="password" class="form-control input-lg" id="editPass" name="editPass">
                        </div>
                    </div>

                    <!--ENTRADA PARA EDITAR PERFIL-->
                    <div class="form-group">

                        <label> Perfil <span class="text-danger">*</span></label>

                        <div class="input-group-prepend">
                            <span class="input-group-text "><i class="fas fa-id-badge"></i></span>

                            <select class="form-control input-lg" name="editPerfil" id="editPerfil" required>
                                <option>Administrador</option>
                                <option>Especial</option>
                                <option>Digitador</option>
                            </select>
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
                    <?php  
              ?>
                </div>
                <?php
                    $obj = new ControladorUsuarios();
                    $obj ->ctrEditar(); 
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
                    <h4>¿Desea borrar usuario?</h4>
                    <input type="hidden" id="idBorrar" name="idBorrar" required>
                    <?php
                    $obj = new ControladorUsuarios();
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