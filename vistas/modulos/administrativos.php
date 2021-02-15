<div class="content-wrapper">
    
    <section class="content-header">

      <h1>

        Gestionar Personal Administrativo
        

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li>
        <li class="active">Gestionar Personal Administrativo</li>
        
      </ol>
       
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        
        <div class="box-header with-border">
          
            <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarAdministrativo">
            Agregar Administrativo
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
                  <th>Cargo</th>
                  <th>Funcion</th>
                  <th>Sedes</th>
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
                    <td><?=$Admi["Id"]?></td>
                    <td><?=$Admi["Nombre"]?> <?=$Admi["ApellidoPa"]?> <?=$Admi["ApellidoMa"]?></td>
                    <td><?=$Admi["IdPersona"]?></td>
                    <td><?=$Admi["Telefono"]?></td>
                    <td><?=$Admi["Cargo"]?></td>
                    <td><?=$Admi["Funcion"]?></td>
                    <td><?=$Admi["Sede"]?></td>
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
                        <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>

                        <button class="btn btn-danger" disabled><i class="fa fa-times"></i></button>
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

            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Administrativo</h4>
            

          </div>
        
          <!-----------------------CUERPO DEL MODAL------------------>
          
          <!--INGRESAR PERSONA-->
          <div class="modal-body">
          <p><span class="text-danger">* Casilla Obligatoria</span>
            <div class="form-group ">
                <label>Seleccione una Persona <span class="text-danger">*</span></label>
                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <select class="form-control input-lg" name="ingIdPersona" required>
                          <option value="">Seleccione</option>
                          <?php 
                          $PersonaLista=ControladorAdministrativos::ctrListarPersonaNoInscrita(); 
                          foreach($PersonaLista as $Key => $Per){
                          ?>
                          <option value="<?=$Per["Id"]?>"><?=$Per["ApellidoPa"]?> <?=$Per["ApellidoMa"]?>
                              <?=$Per["Nombre"]?></option>

                          <?php } ?>
                      </select>
                </div>
            </div>

          <!--INGRESAR SEDE-->
          
            <div class="form-group ">
                <label>Seleccione una Sede <span class="text-danger">*</span></label>
                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
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

                  <div class="input-group">
                      <span class="input-group-addon "><i class="fa fa-users"></i></span>

                      <select class="form-control input-lg" name="IngCargo">
                          <option value="">Seleccionar Cargo</option>
                          <option >Administrador General</option>
                          <option >Administrador de Ruta</option>
                          <option >Secretariado</option>
                      </select>
                  </div>

            </div>



          <!--ENTRADA PARA INGRESAR LA TARJETA DE PROPIEDAD-->
            <div class="form-group">

              <label>Ingrese Funcion</label>
              <div class="input-group">

                  <span class="input-group-addon"><i class="fas fa-font"></i></span>
                  <input type="text" class="form-control input-lg" name="IngFuncion"
                      placeholder="Detallar la funcion">

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
 