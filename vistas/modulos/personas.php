<div class="content-wrapper">

    <section class="content-header">

      <h1>

        Administrar Personas
        

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li>
        <li class="active">Administrar Personas</li>
        
      </ol>
       
    </section>

  
    <section class="content">

     
      <div class="card">

        <div class="card-header with-border">
            <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarPersona">
              Agregar Persona
            </button>
        </div>

        <div class="card-body">
          
          <table class="table table-bordered table-striped dt-responsive Data-Table">
              <thead>
                <tr>
                    <th>DNI</th>
                    <th>Tipo Documento</th>
                    <th>Nacionalidad</th>
                    <th>Nombre</th>
                    <th>ApellidoPa</th>
                    <th>ApellidoMa</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  $ListaPersona=ControladorPersonas::ctrListar();
                  foreach($ListaPersona as $Key => $Per){
                ?>
                <tr>
                    <td><?=$Per["Id"]?></td>
                    <td><?=$Per["TipoDocumento"]?></td>
                    <td><?=$Per["Nacionalidad"]?></td>
                    <td><?=$Per["Nombre"]?></td>
                    <td><?=$Per["ApellidoPa"]?></td>
                    <td><?=$Per["ApellidoMa"]?></td>
                    <td><?=$Per["Telefono"]?></td>
                    <td><?=$Per["Correo"]?></td>
                    <td><?=$Per["Direccion"]?></td>
                    <td><?=$Per["Creado"]?></td>
                    <td>
                      <div class="btn-group">
                          <button class="btn btn-warning" data-target=""><i class="fas fa-pencil-alt"></i></button>

                          <button class="btn btn-danger" onclick="getBorrarUsu(<?=$Per['Id']?>)"
                                  data-toggle="modal" data-target="#modalBorrar"><i class="fa fa-times"></i></button>
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
      Modal Agregar Persona
=====================================================---->

<!-- The Modal -->
<div class="modal fade" id="modalAgregarPersona">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="formaulario" method="post">

        <!------------------------CABEZA DEL MODAL----------------->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Persona</h4>

        </div>

        <!-----------------------CUERPO DEL MODAL------------------>
        <div class="modal-body">
          <p><span class="text-danger">* Casilla Obligatoria</span>
          
              
            <div class="row">

                  <!--ENTRADA PARA SELECCIONAR DOCUMENTO-->
                  <div class="col-md-4">

                      <div class="form-group">
                          <label>Tipo de Documento <span class="text-danger">*</span></label>
                            <select class="form-control input-lg" name="ingTipoDocumento" required>
                                  <option>Seleccione Tipo</option>
                                  <option>DNI</option>
                                  <option>Carnet de Extranjeria</option>
                            </select>
                      </div>

                  </div>

                
                <!--ENTRADA PARA INGRESAR NACIONALIDAD-->       
                <div class="col-md-4">

                      <div class="form-group">

                          <label>Ingrese Nacionalidad<span class="text-danger">*</span></label>

                          <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-passport"></i></span>
                            <input type="text" class="form-control input-lg" name="nuevoNacionalidad" placeholder="Ingresar Nacionalidad" required>
                          </div>

                      </div>

                </div>  

                <!--ENTRADA PARA INGRESAR DOCUMENTO-->
                <div class="col-md-4">

                      <div class="form-group">

                          <label>Ingrese Nro de Documento <span class="text-danger">*</span></label>

                          <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-id-card"></i></span>
                            <input type="text" class="form-control input-lg" name="nuevoNroDoc" pattern="[0-9]{7,10}" maxlength="12"  
                            placeholder="Ingresar Documento" required>
                          </div>

                      </div>

                </div> 


                         
            </div>

          <div class="row">

              <!--ENTRADA PARA INGRESAR NOMBRE-->
              <div class="col-md-4">

                <div class="form-group">

                  <label>Ingrese Nombre <span class="text-danger">*</span></label>

                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>

                    </div>

                </div>

              </div>

              <!--ENTRADA PARA INGRESAR APELLIDO PATERNO-->
            <div class="col-md-4">
                <div class="form-group">
                    <label>Ingrese Apellido Paterno <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fas fa-user"></i></span>
                          <input type="text" class="form-control input-lg" name="nuevoApellidoPa" placeholder="Ingresar Apellido Paterno" required>
                        </div>
                              
                    </div>
                </div>
            </div>


            <div class="col-md-4">
              <div class="form-group">
                  <label>Ingrese Apellido Materno <span class="text-danger">*</span></label>
                  <div class="input-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control input-lg" name="nuevoApellidoMa" placeholder="Ingresar Apellido Materno" required>
                      </div>
                          
                  </div>
              </div>
            </div>  
              

          </div>

          <div class="row">

              <!--ENTRADA PARA INGRESAR CELULAR-->
              <div class="col-md-4">

                <div class="form-group">

                  <label>Ingrese telefono o celular <span class="text-danger">*</span></label>

                  <div class="input-group">
              
                    <span class="input-group-addon"><i class="fas fa-phone-alt"></i></span>
                    <input type="text" pattern="[0-9]{7,10}" maxlength="10" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar Telefono" required>

                  </div>

                </div>

              </div>


              <!--ENTRADA PARA INGRESAR CORREO-->
              <div class="col-md-4">

                  <div class="form-group">

                    <label>Ingrese Correo<span class="text-danger">*</span></label>

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fas fa-envelope-open-text"></i></span>
                        <input type="text" class="form-control input-lg" name="nuevoCorreo" placeholder="Ingresar Correo" required>

                      </div>

                  </div>

              </div>   

              <!--ENTRADA PARA INGRESAR DIRECCION-->
              <div class="col-md-4">

                  <div class="form-group">

                    <label>Ingrese Direccion</label>

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fas fa-city"></i></span>
                        <input type="nu" class="form-control input-lg" name="nuevoDireccion" placeholder="Ingresar Direccion" >

                      </div>

                  </div>

              </div>   


          </div>

        </div>

        <!-------------------PIE DEL MODAL----------------->
        <div class="modal-footer">

        <button type="submit" class="btn btn-primary">Guardar</button>

          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

          

        </div>
        <?php

          $crearPersona = new ControladorPersonas();
          $crearPersona -> ctrCrearPersonas();
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
                    <h4>¿Desea borrar Persona?</h4>
                    <input type="hidden" id="idBorrar" name="idBorrar" required>
                    <?php
                    $obj = new ControladorPersonas();
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









