<?php

class ControladorVehiculo{

    static public function ctrAgregar(){
        if(isset($_POST["IngPlaca"])){ 
            $respuesta=ModeloVehiculo::mdlCrear($_POST["IngIdPropietario"],$_POST["IngPlaca"],$_POST["IngMarca"],$_POST["IngAño"],$_POST["IngTipo"]);
            if($respuesta==="ok"){
                echo '<script>
                Swal.fire({
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

    static public function ctrBorrar(){
        if(isset($_POST["idBorrar"])){   
            $respuesta = ModeloVehiculo::mdlBorrar($_POST["idBorrar"]);
            if($respuesta==="ok"){
                echo '<script>
                Swal.fire({
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
                Swal.fire({
                    icon: "error",
                    title: "No se pudo borrar"
                });   
                </script> 
                ';
            } 
        }
    }

    static public function ctrListarPropietarios(){
        $Lista = ModeloVehiculo::mdlListarPropetarios();
        return $Lista;
    }

    static public function ctrListar(){
        $Lista = ModeloVehiculo::mdlListar();
        return $Lista;
    }

    
}

