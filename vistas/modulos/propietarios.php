<div class="content-wrapper">
    
    <section class="content-header">

      <h1>

        Administrar Propietarios
        

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fas fa-home"></i>Inicio</a></li>
        <li class="active">Administrar Propietarios</li>
        
      </ol>
       
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
          <div class="box-header with-border">
              <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarPropietario">
                Registrar Propietarios
              </button>
          </div>

          <div class="box-body">

              <table class="table table-bordered table-striped dt-responsive tablas">   

                <thead>
                  <tr>
                      <th  style="width:10px">#</th>
                      <th>Persona</th>  
                      <th>Nro Documento</th>
                      <th>Nro Tarjeta de Propiedad</th>
                      <th>RUC</th>
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
                      <td><?=$Pro["Id"]?></td>
                      <td><?=$Pro["Nombre"]?> <?=$Pro["ApellidoPa"]?> <?=$Pro["ApellidoMa"]?></td>
                      <td><?=$Pro["IdPersona"]?></td>
                      <td><?=$Pro["TarjetaPropiedad"]?></td>
                      <td><?=$Pro["Ruc"]?></td>
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
                            <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>

                            <button class="btn btn-danger" onclick="getBorrarUsu(<?=$Pro['Id']?>)"
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

            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Propietario</h4>
            

          </div>
        
          <!-----------------------CUERPO DEL MODAL------------------>
          <div class="modal-body">
              
                 <!--ENTRADA PARA INGRESAR PERSONA-->
                 <div class="form-group ">

                    <label>Seleccione una Persona <span class="text-danger">*</span></label>
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <select class="form-control input-lg" name="ingIdPersona" required>
                              <option value="">Seleccione</option>
                              <?php 
                              $PersonaLista=ControladorPropietario::mdlListarPersonaNoInscrita(); 
                              foreach($PersonaLista as $Key => $Per){
                              ?>
                              <option value="<?=$Per["Id"]?>"><?=$Per["ApellidoPa"]?> <?=$Per["ApellidoMa"]?>
                                  <?=$Per["Nombre"]?></option>

                              <?php } ?>
                          </select>
                    </div>


                  </div>

                  <!--ENTRADA PARA INGRESAR LA TARJETA DE PROPIEDAD-->
                  <div class="form-group">

                    <label>Ingrese Tarjeta de Propiedad <span class="text-danger">*</span></label>
                    <div class="input-group">

                        <span class="input-group-addon"><i class="far fa-credit-card"></i></span>
                        <input type="text" class="form-control input-lg" name="ingTarjetaPro"
                            placeholder="Ingresar Tarjeta de Propiedad" required>

                    </div>

                  </div>

                  <!--ENTRADA PARA INGRESAR RUC-->

                  <div class="form-group">

                    <label>Ingrese Ruc</label>
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control input-lg" pattern="[0-9]{7,10}" maxlength="11"  name="ingRuc"
                            placeholder="Ingresar Nro de Ruc">

                    </div>

                  </div>

                  <!--ENTRADA PARA INGRESAR TELEFONO DE EMERGENCIA-->

                  <div class="form-group">

                    <label>Ingrese Telefono o Celular de Emergencia</label>
                    <div class="input-group">

                            <span class="input-group-addon"><i class="fas fa-phone-alt"></i></span>
                            <input type="text" class="form-control input-lg" pattern="[0-9]{7,10}" maxlength="9"  name="ingTel"
                            placeholder="Ingresar Nro de Telefeno">

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