<div class="content-wrapper">

    <section class="content-header">

        <div class="row">
            <div class="col-md-6">
                <h1>
                    Detalle de Rutas
                </h1>
            </div>

            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li>
                    <li class="breadcrumb-item active">Detalle de Rutas</li>
                </ol>
            </div>
        </div>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">

            <div class="card-header with-border">

            </div>



            <div class="card-body">

                <table class="table table-bordered table-striped dt-responsive Data-Table" style="width:100%">

                    <thead>
                        <tr>

                            <th style="width:10px">#</th>
                            <th>Conductor</th>
                            <th>Placa</th>
                            <th>Fecha</th>
                            <th>Ganancia</th>
                            <th>Observacion</th>
                            <th>Accion</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        $ListaRuta=ControladorRuta::ctrListar();
                        foreach($ListaRuta as $Key => $ruta){
                        ?>

                        <tr>

                            <td><?=($Key+1)?></td>
                            <td><?=$ruta["Conductor"]?></td>
                            <td><?=$ruta["Placa"]?></td>
                            <td><?=$ruta["Fecha"]?></td>
                            <td><?=$ruta["Ganancia"]?></td>
                            <td><?=$ruta["Vuelta"]?></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#modalAgregarDetalleRuta" onclick="getRuta('<?=$ruta['Id']?>')"><i
                                            class="fas fa-plus-circle"></i></button>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-warning" data-toggle="modal"
                                        data-target="#modalListarDetalleRuta" onclick="getRuta('<?=$ruta['Id']?>')"><i
                                            class="fas fa-eye"></i></button>
                                            
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