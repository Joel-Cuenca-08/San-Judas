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
    
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPersona">
              Agregar Persona
            </button>

        </div>

        <div class="card-body">
          
          <table class="table table-bordered table-striped dt-responsive tablas">
              <thead>
                <tr>
                    <th  style="width:10px">#</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Telefono</th>
                    <th>Tipo de Documento</th>
                    <th>Nro. Documento</th>
                    <th>Nacionalidad</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                    <td>1</td>
                    <td>Joel</td>
                    <td>Cuenca Villogas</td>
                    <td>Cuenca Villogas</td>
                    <td>981323726</td>
                    <td>DNI</td>
                    <td>78594637</td>
                    <td>Peruana</td>
                    <td>joel.04@gmail.com</td>
                    <td>Mz o lt 39 VES</td>
                    <td>
                      <div class="btn-group">
                          <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>

                          <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                      </div>
                    </td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>Joel</td>
                    <td>Cuenca Villogas</td>
                    <td>Cuenca Villogas</td>
                    <td>981323726</td>
                    <td>DNI</td>
                    <td>78594637</td>
                    <td>Peruana</td>
                    <td>joel.04@gmail.com</td>
                    <td>Mz o lt 39 VES</td>
                    <td>
                      <div class="btn-group">
                          <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>

                          <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                      </div>
                    </td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>danitza</td>
                    <td>carrasco</td>
                    <td>Chuqihuanca</td>
                    <td>923859290</td>
                    <td>DNI</td>
                    <td>78594637</td>
                    <td>Peruana</td>
                    <td>nisha@gmail.com</td>
                    <td>Mz o lt 39 VES</td>
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
      Modal Agregar Usuario
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
          
              <!--ENTRADA PARA INGRESAR NOMBRE-->
              <div class="row">

                <div class="col-md-4">

                    <div class="form-group">
                    
                      <label>Ingrese Nombre <span class="text-danger">*</span></label>

                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>

                      </div>

                    </div>
                
                </div>

                <!--ENTRADA PARA INGRESAR APELLIDOS-->
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
                    <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar Telefono" required>

                  </div>

                </div>

              </div>

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

              <!--ENTRADA PARA INGRESAR DOCUMENTO-->
              <div class="col-md-4">

                  <div class="form-group">

                    <label>Ingrese Nro de Documento <span class="text-danger">*</span></label>

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fas fa-id-card"></i></span>
                        <input type="text" class="form-control input-lg" name="nuevoNroDoc" placeholder="Ingresar Documento" required>

                      </div>

                  </div>

              </div>

          </div>

          <div class="row">

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
                        <input type="text" class="form-control input-lg" name="nuevoDireccion" placeholder="Ingresar Direccion" required>

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

      </form>

    </div>


  </div>
  
</div>











