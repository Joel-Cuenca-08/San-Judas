<div class="content-wrapper">

    <section class="content-header">

        <div class="row">
            <div class="col-md-6">
                <h1>
                    Historial de Rutas
                </h1>
            </div>

            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li>
                    <li class="breadcrumb-item active">Historial de Rutas</li>
                </ol>
            </div>
        </div>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">

           <div class="card-header with-border">

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                        <span><i class="far fa-calendar-alt"></i> Rango de Fecha </span>
                        <i class="fas fa-caret-down"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped table-sm dt-responsive Data-Table" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Conductor</th>
                            <th>Placa</th>
                            <th>Fecha</th>
                            <th>Registros</th>
                            <th>Nro de Vueltas</th>
                            <th>Ganancia</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        //$ListaRuta=ControladorRuta::ctrListarRutaDetallada();}
                        if(isset($_GET["fechaInicial"])){
                            $fechaInicial = $_GET["fechaInicial"];
                            $fechaFinal = $_GET["fechaFinal"];
                        }else{
                            $fechaInicial = null;
                            $fechaFinal = null;
                            
                        }
                        $ListaRuta=ControladorRuta::ctrRangoFechaGanancia($fechaInicial, $fechaFinal);

                        foreach($ListaRuta as $Key => $ruta){
                        ?>

                        <tr>

                            <td><?=($Key+1)?></td>
                            <td><?=$ruta["Conductor"]?></td>
                            <td><?=$ruta["Placa"]?></td>
                            <td><?=$ruta["Fecha"]?></td>
                            <td><?=$ruta["Detalle"]?></td>
                            <td><?=$ruta["Vuelta"]?></td>
                            <td>S/.<?=$ruta["Ganancia"]?></td>

                            <?php } ?>
                        </tr>

                    </tbody>

                </table>


            </div>


        </div>


    </section>

</div>