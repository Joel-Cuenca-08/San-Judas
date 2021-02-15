<div class="content-wrapper">
    
    <section class="content-header">

      <h1>

        Administrar Conductores
        

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li>
        <li class="active">Administrar Conductores</li>
        
      </ol>
       
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
          <div class="box-header with-border">

              <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarConductor">
              Agregar Conductor
              </button>
          </div>

          <div class="box-body">
              
          <table class="table table-bordered table-striped dt-responsive tablas">   

              <thead>
                <tr>
                    <th  style="width:10px">#</th>
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
                      <td><?=$Con["Id"]?></td>
                      <td><?=$Con["Nombre"]?> <?=$Con["ApellidoPa"]?> <?=$Con["ApellidoMa"]?></td>
                      <td><?=$Con["IdPersona"]?></td>
                      <th><?=$Con["Telefono"]?></th>
                      <th><?=$Con["CatLicencia"]?></th>
                      <th><?=$Con["NroLicencia"]?></th>
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
                            <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>

                            <button class="btn btn-danger" onclick="getBorrarUsu(<?=$Con['Id']?>)"
                                        data-toggle="modal" data-target="#modalBorrar" ><i
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

            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Conductor</h4>
            

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

                      <div class="input-group">
                          <span class="input-group-addon "><i class="fa fa-users"></i></span>

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
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
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