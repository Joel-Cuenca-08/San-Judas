<div class="content-wrapper">

    <section class="content-header">

        <div class="row">
            <div class="col-md-6">
                <h1>
                    Reporte
                </h1>
            </div>

            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li>
                    <li class="breadcrumb-item active">Reporte</li>
                </ol>
            </div>
        </div>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header with-border">


                <div class="input-group">
                    <button type="button" class="btn btn-default pull-right" id="daterange-btn2">
                        <span><i class="far fa-calendar-alt"></i> Rango de Fecha </span>
                        <i class="fas fa-caret-down"></i>
                    </button>
                </div>

            </div>
            <div class="card-body">

                <div class="row">
                    
                        <?php
                            include "reportes/grafico-ganancia.php";
                        ?>
                    
                </div>
            </div>
        </div>

    </section>

</div>