<div class="content-wrapper">
    
    <section class="content-header">

      <h1>

        Administrar Usuarios
        

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li>
        <li class="active">Administrar Usuarios</li>
        
      </ol>
       
    </section>

    
    <section class="content">

     
      <div class="box">

        <div class="box-header with-border">

            <div class="box-header with-border">

            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
            Agregar Usuario
            </button>

            </div>

        </div>

        <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas">   

            <thead>
              <tr>
                  <th  style="width:10px">#</th>
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
                          $Lista=ControladorUsuarios::ctrListar(null);
                          foreach($Lista as $Key => $Usu){
                          ?>
              <tr>
                  <td><?=$Usu["Id"]?></td>
                  <td><?=$Usu["Nombre"]?> <?=$Usu["ApellidoPa"]?> <?=$Usu["ApellidoMa"]?></td>
                  <td><?=$Usu["usuario"]?></td>
                  <td><?=$Usu["perfil"]?></td>
                  <td><?=$Usu["password"]?></td>
                  <td><button class="btn btn-success btn-xs">Activado</button></td>
                  <td>
                    <div class="btn-group">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditar"onclick="getEditUsu(<?=$Usu['Id']?>)"><i class="fas fa-pencil-alt"></i></button>

                        <button class="btn btn-danger"  onclick="getBorrarUsu(<?=$Usu['Id']?>)"  data-toggle="modal" data-target="#modalBorrar"><i class="fa fa-times"></i></button>
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

        <form role="formaulario" method="post">

          <!------------------------CABEZA DEL MODAL----------------->
          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Usaurio</h4>
            

          </div>
        
          <!-----------------------CUERPO DEL MODAL------------------>
          <div class="modal-body">
              <p><span class="text-danger">* Casilla Obligatoria</span>

                <!--ENTRADA PARA INGRESAR PERSONA-->
                  <div class="form-group ">
                    
                    

                        <label>Seleccione una Persona <span class="text-danger">*</span></label>
                        <div class="input-group">
                          
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <select class="form-control input-lg" name="ingIdPersona" required>
                          <option value="">Seleccione</option>
                          <?php 
                          $PersonaLista=ControladorUsuarios::ctrListarPersona(); 
                          foreach($PersonaLista as $Key => $Per){
                          ?>
                            <option value="<?=$Per["Id"]?>"><?=$Per["ApellidoPa"]?> <?=$Per["ApellidoMa"]?> <?=$Per["Nombre"]?></option>
                          
                          <?php } ?>
                          </select>
                        </div>
                    

                  </div>

                <!--ENTRADA PARA INGRESAR USUARIO-->

                  <div class="form-group">

                      

                          <label>Ingrese Usuario <span class="text-danger">*</span></label>

                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control input-lg" name="ingUsuario" placeholder="Ingresar Usuario" required>

                          </div>  

                  </div>


                <!--ENTRADA PARA INGRESAR CONTRASEÑA-->

                <div class="form-group">

                    <label>Ingrese Contraseña <span class="text-danger">*</span></label>

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="password" class="form-control input-lg" name="ingPass" placeholder="Ingresar Contraseña" required>

                      </div>  

                </div>




                <!--ENTRADA PARA INGRESAR PERFIL-->
                <div class="form-group">

                    <label>Ingrese Perfil <span class="text-danger">*</span></label>  

                      <div class="input-group">
                        <span class="input-group-addon "><i class="fa fa-users"></i></span>
                        
                          <select class="form-control input-lg" name="ingPerfil">
                            <option value="">Seleccionar Perfil</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Especial">Especial</option>
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

<!-- Modal -->
<div class="modal fade" id="modalEditar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <form role="formaulario" method="post">

          <!------------------------CABEZA DEL MODAL----------------->
          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Usaurio</h4>
            

          </div>
        
          <!-----------------------CUERPO DEL MODAL------------------>
          <div class="modal-body">
              <p><span class="text-danger">* Casilla Obligatoria</span>

                <!--ENTRADA PARA INGRESAR PERSONA-->
                  <div class="form-group ">
                    
                    

                        <label>Persona <span class="text-danger">*</span></label>
                        <div class="input-group">
                          
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <select class="form-control input-lg" id="editIdPer" disabled>
                          <option value="">Seleccione</option>
                          <?php 
                          $PersonaLista=ControladorUsuarios::ctrListarPersona(); 
                          foreach($PersonaLista as $Key => $Per){
                          ?>
                            <option value="<?=$Per["Id"]?>"><?=$Per["ApellidoPa"]?> <?=$Per["ApellidoMa"]?> <?=$Per["Nombre"]?></option>
                          
                          <?php } ?>
                          </select>
                        </div>
                    

                  </div>

                <!--ENTRADA PARA INGRESAR USUARIO-->

                  <div class="form-group">

                      

                          <label> Usuario <span class="text-danger">*</span></label>

                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control input-lg" name="editUsuario" id="editUsuario" required>

                          </div>  

                  </div>


                <!--ENTRADA PARA INGRESAR CONTRASEÑA-->

                <div class="form-group">

                    <label> Contraseña <span class="text-danger">*</span></label>

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="password" class="form-control input-lg" name="editPass" id="editPass" placeholder="Ingresar Contraseña" required>

                      </div>  

                </div>




                <!--ENTRADA PARA INGRESAR PERFIL-->
                <div class="form-group">

                    <label> Perfil <span class="text-danger">*</span></label>  

                      <div class="input-group">
                        <span class="input-group-addon "><i class="fa fa-users"></i></span>
                        
                          <select class="form-control input-lg" name="editPerfil" id="editPerfil">
                            <option value="">Seleccionar Perfil</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Especial">Especial</option>
                            <option value="Digitador">Digitador</option>
                          </select>
                      </div>
                  
                </div>
                <!--ENTRADA PARA INGRESAR PERFIL-->
                <div class="form-group">

                    <label> Estado <span class="text-danger">*</span></label>  

                      <div class="input-group">
                        <span class="input-group-addon "><i class="fa fa-users"></i></span>
                        
                          <select class="form-control input-lg" name="editEstado" id="editEstado">
                            <option value="">Seleccionar Estado</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Especial">Especial</option>
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