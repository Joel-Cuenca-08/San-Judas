<?php

class ControladorRuta{

    static public function ctrAgregar(){
        if(isset($_POST["ingPlaca"])){            
            $arrayD = array(
                "IdConductor"=>$_POST["ingConductor"], 
                "IdAdministrativo"=>$_POST["ingAdministrativo"],
                "IdVehiculo"=>$_POST["ingPlaca"]
            );       
            
            $respuesta=ModeloRuta::mdlAgregar($arrayD);                     
            if($respuesta ==="ok"){
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Registrado",
                    text: "Se registro correctamente",
                    allowOutsideClick: false
                  }).then((result)=>{
                      if(result.value){
                        window.location="rutas"; 
                      }
                    });
                </script>
                ';
            }else{
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "error",
                    text: "No Se registro",
                    allowOutsideClick: false
                  });
                </script>';
            }
            
        }
    }

    static public function ctrAgregarDetalle(){
       if(isset($_POST["ingSalida"])){
        date_default_timezone_set("America/Lima");
            if($_POST["editEstado"]==="0"){
            //salida
            $arrayD = array(
                "IdRuta"=>$_POST["editId"], 
                "HoraSalida"=>date("H:i:s")
            ); 
            $respuesta=ModeloRuta::mdlAgregarDetalle($arrayD);
            }else{
            //llegada    
            $arrayD = array(
                "Id"=>$_POST["editEstado"], 
                "HoraLlegada"=>date("H:i:s")
            ); 
            $respuesta=ModeloRuta::mdlAgregarDetalleLlegada($arrayD);
            }      
            
                                
            if($respuesta ==="ok"){
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Registrado",
                    text: "Se registro correctamente",
                    allowOutsideClick: false
                  }).then((result)=>{
                      if(result.value){
                        window.location="rutas"; 
                      }
                    });
                </script>
                ';
            }else{
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "error",
                    text: "No Se registro",
                    allowOutsideClick: false
                  });
                </script>';
            }
            
        }
    }

    static public function ctrListar(){
        $Lista = ModeloRuta::mdlListar();
        return $Lista;

    }

    static public function ctrBuscarRuta($id){
        $Lista = ModeloRuta::mdlBuscarRuta($id);
        return $Lista;
    }

    static public function ctrListarVehiculo(){
        $ListaV = ModeloRuta::mdlListarVehiculo();
        return $ListaV;
    }

    static public function ctrListarConductor(){
        $ListaC = ModeloRuta::mdlListarConductor();
        return $ListaC;
    }

    
    static public function ctrListarAdministrativo(){
        $ListaC = ModeloRuta::mdlListarAdministrativo();
        return $ListaC;
    }

    static public function ctrListarDetalleRuta(){

        if(isset($_POST["editId"])){
            $lista = ModeloRuta::mdlListarDetalleRuta($_POST["editId"]);      
        }
        return $lista;
        
    }

    static public function ctrEditar(){
        if(isset($_POST["editIdCierre"])){

            $arrayD = array(
                
                "Ganancia"=>$_POST["editGanancia"],
                "Observacion"=>$_POST["editObservacion"],
                "Id"=>$_POST["editIdCierre"]
            );    
            $respuesta=ModeloRuta::mdlEditarRuta($arrayD);  
            if($respuesta==="ok"){
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Actualizado",
                    text: "Se actualizo correctamente",
                    allowOutsideClick: false
                  }).then((result)=>{
                      if(result.value){
                        window.location="rutas"; 
                      }
                    });
                </script>
                ';
            }else{
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "error",
                    text: "No Se registro",
                    allowOutsideClick: false
                  });
                </script>';
            }
        }
    }

    static public function ctrSumaGanancia(){
        $ganancia = ModeloRuta::mdlSumaGanancia();
        return $ganancia;
    }

    /**Listar Ruta Detalle**/
    static public function ctrListarRutaDetallada(){
        $Lista = ModeloRuta::mdlListarRutaDetalle();
        return $Lista;
    }

    /**Rango de Fechas**/
    static public function ctrRangoFechaGanancia($fechaInicial, $fechaFinal){
        $respuesta = ModeloRuta::mdlRangoFechaGanancia($fechaInicial, $fechaFinal);
        return $respuesta;

    }
    
}