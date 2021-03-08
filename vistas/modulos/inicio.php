

<div class="content-wrapper">

    <section class="content-header">


        <div class="row">
            <div class="col-md-6">
                <h1>
                    Inicio
                </h1>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Inicio</a></li>
                    <li class="breadcrumb-item active">Inicio</li>
                </ol>
            </div>
        </div>

    </section>

    <!-- Main content -->
    <section class="content">


        <!-- /.box-body -->
        <div class="card">
            <div class="card-header with-border">
                <div class="col-12">
                    <h1 class="text-center">Bienvenido al Sistema</h1>
                </div>
            </div>

            <div class="card-body">

            <?php
            if($_SESSION["Perfil"]== "Administrador"){
                include "inicio/cajas-superiores.php";
            }
            ?>

            </div>
            <div class="col-lg-12">
                <?php 
                if($_SESSION["Perfil"] == "Especial" || $_SESSION["Perfil"] == "Digitador"){

                    echo '<h1 style="text-align:center">'.$_SESSION["NOMBRE"].' '.$_SESSION["APELLIDO"].' ('.$_SESSION["Perfil"].')'.'</h1>';
                }
                ?>
            </div>



            <!-- /.box-footer-->
        </div>
        <!-- /.box -->





    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->