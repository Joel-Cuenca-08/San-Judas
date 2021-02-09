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
          
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAdministrativo">
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
                  <th>Estado</th>
                  <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                  <td>1</td>
                  <td>Joel Cuenca</td>
                  <td>78362718</td>
                  <th>981323219</th>
                  <td>Administrador de Ruta</td>
                  <td>Registrar los horarios de salida</td>
                  <td><button class="btn btn-success btn-xs">Activado</button></td>
                  <td>
                    <div class="btn-group">
                        <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>

                        <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    </div>
                  </td>
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

        <form role="formaulario" method="post">

          <!------------------------CABEZA DEL MODAL----------------->
          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Administrativo</h4>
            

          </div>
        
          <!-----------------------CUERPO DEL MODAL------------------>
          <div class="modal-body">
            <p>Some text in the modal.</p>
          </div>

           <!-------------------PIE DEL MODAL----------------->
          <div class="modal-footer">

            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

          </div>

        </form>

      </div>
      
    </div>

</div>
 