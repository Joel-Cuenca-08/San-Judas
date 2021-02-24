<?php

class ControladorRuta{

    static public function ctrAgregar(){
        if(isset($_POST["ingPlaca"])){
            $arrayD = array(
                "IdConductor"=>$_POST["ingConductor"], 
                "IdAdministrativo"=>$_POST["ingAdministrativo"],
                "Fecha"=>$_POST["ingFecha"],
                "Observacion"=>$_POST["ingVuelta"] 
            );        
            $respuesta=ModeloRuta::mdlAgregar($arrayD); 
            
            if($respuesta === "ok"){
                $array2 = array(
                    "IdRuta"=>$_POST["ingId"],
                    "IdVehiculo"=>$_POST["ingPlaca"],
                    "HoraSalida"=>$_POST["ingSalida"]
                   
                );
            
                $respuesta2=ModeloRuta::mdlAgregarDetalle($array2); 
            }
            
            if($respuesta2 ==="ok"){
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

    static public function ctrEditar(){


    }

    static public function ctrListar(){

        $Lista = ModeloRuta::mdlListar();
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


}