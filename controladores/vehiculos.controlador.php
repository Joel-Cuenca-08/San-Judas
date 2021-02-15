<?php

class ControladorVehiculo{

    static public function ctrAgregar(){
        if(isset($_POST["IngID"])){
            
            $arrayD = array(
                "Id"=> $_POST["IngID"],
                "IdPropietario"=>$_POST["IngIdPropietario"],
                "Marca"=>$_POST["IngMarca"],
                "Año"=>$_POST["IngAño"],
                "Tipo"=>$_POST["IngTipo"]   
            );
            $respuesta=ModeloVehiculo::mdlCrear($arrayD);
            if($respuesta==="ok"){
                echo '<script>
                swal({
                    icon: "success",
                    title: "Registrado",
                    text: "Se registro correctamente",
                    allowOutsideClick: false
                  }).then((result)=>{
                      if(result.value){
                        window.location="vehiculos"; 
                      }
                    });
                </script>
                ';
            }else{
                echo '<script>
                swal({
                    icon: "error",
                    title: "error",
                    text: "No Se registro",
                    allowOutsideClick: false
                  });
                </script>';
            }
        }
    }

    static public function ctrBorrar(){
        if(isset($_POST["idBorrar"])){   
            $respuesta = ModeloVehiculo::mdlBorrar($_POST["idBorrar"]);
            if($respuesta==="ok"){
                echo '<script>
                swal({
                    icon: "success",
                    title: "Borrado",
                    text: "Se borro correctamente",
                    allowOutsideClick: false
                }).then((result)=>{
                    if(result.value){
                        window.location="vehiculos"; 
                    }
                    });
                </script>
                ';  
            } else{
                echo ' 
                <script> 
                swal({
                    icon: "error",
                    title: "No se pudo borrar"
                });   
                </script> 
                ';
            } 
        }
    }

    static public function ctrListarPropietarios(){
        $Lista = ModeloVehiculo::mdlListarPropietarios();
        return $Lista;
    }

    static public function ctrListar(){
        $Lista = ModeloVehiculo::mdlListar();
        return $Lista;
    }

    
}

