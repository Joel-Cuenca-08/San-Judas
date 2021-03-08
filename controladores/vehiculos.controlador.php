<?php

class ControladorVehiculo{

    static public function ctrAgregar(){
        if(isset($_POST["IngPlaca"])){ 
            $respuesta=ModeloVehiculo::mdlCrear($_POST["IngIdPropietario"],$_POST["IngPlaca"],$_POST["IngTipo"]);
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


    static public function ctrEditarV(){
        if(isset($_POST["editId"])){

           /* $arrayD = array(
                "Id"=>$_POST["editId"], 
                "Placa"=>$_POST["editPlaca"],
                "Marca"=>$_POST["editMarca"],
                "Año"=>$_POST["editAño"],
                "Tipo"=>$_POST["editTipo"],
                "Estado"=>$_POST["editEstado"]  
            );     
            $respuesta=ModeloVehiculo::mdlEditarV($arrayD);  */
            $respuesta=ModeloVehiculo::mdlEditarV($_POST["editPlaca"],$_POST["editTipo"],$_POST["editEstado"],$_POST["editId"]);
            
            if($respuesta==="ok"){
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Actualizado",
                    text: "Se actualizo correctamente",
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

    
}

