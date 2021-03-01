<?php

class ControladorRuta{

    static public function ctrAgregar(){
        if(isset($_POST["ingPlaca"])){
            $arrayD = array(
                "IdConductor"=>$_POST["ingConductor"], 
                "IdAdministrativo"=>$_POST["ingAdministrativo"],
                "IdVehiculo"=>$_POST["ingPlaca"],
                "Fecha"=>$_POST["ingFecha"],
                "Observacion"=>$_POST["ingVuelta"] 
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
            $arrayD = array(
                "IdRuta"=>$_POST["editId"], 
                "HoraSalida"=>$_POST["ingSalida"]
            );       
            
           
            $respuesta=ModeloRuta::mdlAgregarDetalle($arrayD);                     
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
    
}