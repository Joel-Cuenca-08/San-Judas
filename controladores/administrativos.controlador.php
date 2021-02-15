<?php

class ControladorAdministrativos{
    

    static public function ctrListar(){
        $Lista = ModeloAdministrativos::MdlListar();
        return $Lista;
    }

    /**Agregar**/
    static public function ctrAgregar(){
        if(isset($_POST["ingIdPersona"])){
            
            $arrayD = array(
                "IdPersona"=>$_POST["ingIdPersona"],
                "IdSede"=>$_POST["ingIdSede"],
                "Cargo"=>$_POST["IngCargo"],
                "Funcion"=>$_POST["IngFuncion"]   
            );
            $respuesta=ModeloAdministrativos::mdlCrear($arrayD);
            if($respuesta==="ok"){
                echo '<script>
                swal({
                    type: "success",
                    title: "Registrado",
                    text: "Se registro correctamente",
                    allowOutsideClick: false
                  }).then((result)=>{
                      if(result.value){
                        window.location="administrativos"; 
                      }
                    });
                </script>
                ';
            }else{
                echo '<script>
                swal({
                    type: "error",
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
                $respuesta = ModeloAdministrativo::mdlBorrar($_POST["idBorrar"]);
                if($respuesta==="ok"){
                    echo '<script>
                    swal({
                        type: "success",
                        title: "Borrado",
                        text: "Se borro correctamente",
                        allowOutsideClick: false
                    }).then((result)=>{
                        if(result.value){
                            window.location="propietarios"; 
                        }
                        });
                    </script>
                    ';  
                } else{
                    echo ' 
                    <script> 
                    swal({
                        type: "error",
                        title: "No se pudo borrar"
                    });   
                    </script> 
                    ';
                } 
        }
    }

    static public function ctrListarPersonaNoInscrita(){
        $Lista = ModeloAdministrativos::MdlListarPersonaNoInscrita();
        return $Lista;
    } 

    static public function ctrListarSede(){
        $Lista = ModeloAdministrativos::mdlListarSede();
        return $Lista;
    }
}