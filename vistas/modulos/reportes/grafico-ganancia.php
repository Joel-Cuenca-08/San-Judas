<?php
     if(isset($_GET["fechaInicial"])){ 
        $fechaInicial = $_GET["fechaInicial"];
        $fechaFinal = $_GET["fechaFinal"];
    }else{
        $fechaInicial = null;
        $fechaFinal = null;
        
    }
    $respuesta=ControladorRuta::ctrRangoFechaGanancia($fechaInicial, $fechaFinal);

    foreach($respuesta as $Key => $ruta){


        


    }
?>

<!--GRAFICO DE GANANCIA--->

<section>
    <div class="container">
        
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    Gráfico de Ganancias
                </h3>

            </div>

            <div class="card-body border-radius-none nuevoGraficoGanancia">

                <div class="chart" id="lineChart" style="height: 100%;"></div>

            </div>

        </div>
    </div>
</section>
<script>
    
</script>