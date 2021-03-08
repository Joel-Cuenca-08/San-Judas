<?php

    $ganacia = ControladorRuta::ctrSumaGanancia();

    $ruta = ControladorRuta ::ctrListar();
    $totalruta = count($ruta);

    $conductor = ControladorConductor::ctrListar();
    $totalconductor = count($conductor);

    $vehiculo = ControladorVehiculo::ctrListar();
    $totalvehiculo = count($vehiculo);

?>
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>S/.<?php echo number_format($ganacia["total"],2); ?></h3>
                    <p>Ganancias</p>
                </div>
                <div class="icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <a href="detalleRuta" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php echo number_format($totalconductor); ?></h3>

                    <p>Conductores</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <a href="conductores" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?php echo number_format($totalvehiculo); ?></h3>

                    <p>Vehículos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-bus"></i>
                </div>
                <a href="vehiculos" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?php echo number_format($totalruta); ?></h3>

                    <p>Rutas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-road"></i>
                </div>
                <a href="rutas" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>

    <div class="row">
</section>

