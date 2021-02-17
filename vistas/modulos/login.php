<div class="login-box">
    <!-- /.login-logo -->
    <div class="F-Down card shadow">
        <div class="card-body login-card-body">
            <center>
                <img src="vistas/img/plantilla/icono-sj2.png" class="img-responsive" style="width: 100%">
            </center>

<br>
<br>
            <form class="needs-validation" method="post" novalidate>

                <div class="form-group">
                    <label>Usuario</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" pattern="[0-9]{6,15}" maxlength="15"
                            placeholder="N° de Documento" name="ingUsuario" autofocus required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-id-card text-primary"></i>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            Recuerde ingresar correctamente su N° de Documento
                        </div>

                        <div class="valid-feedback">
                            N° de Documento valido
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <div class="input-group mb-3" id="show_hide_password2">
                        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>

                <?php
          $login = new ControladorUsuarios();
          $login -> ctrIngresarUsuario();  
      ?>

            </form>


        </div>

    </div>