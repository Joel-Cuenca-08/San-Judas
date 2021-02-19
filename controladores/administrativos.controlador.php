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
                "IdPeriodo"=>$_POST["ingPeriodo"],
                "Cargo"=>$_POST["IngCargo"],
                "Funcion"=>$_POST["IngFuncion"]   
            );
            $respuesta=ModeloAdministrativos::mdlCrear($arrayD);
            if($respuesta==="ok"){
                echo '<script>
                Swal.fire({
                    icon: "success",
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
                $respuesta = ModeloAdministrativos::mdlBorrar($_POST["idBorrar"]);
                
                if($respuesta==="ok"){
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Borrado",
                        text: "Se borro correctamente",
                        allowOutsideClick: false
                    }).then((result)=>{
                        if(result.value){
                            window.location="administrativos"; 
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

    static public function ctrListarPersonaNoInscrita(){
        $Lista = ModeloAdministrativos::MdlListarPersonaNoInscrita();
        return $Lista;
    } 

    static public function ctrListarSede(){
        $Lista = ModeloAdministrativos::mdlListarSede();
        return $Lista;
    }

    static public function ctrListarPeriodo(){
        $Lista = ModeloAdministrativos::mdlListarPeriodo();
        return $Lista;
    }



    static public function ctrEditar(){
        if(isset($_POST["editIdPersona"])){
            
            $arrayD = array(
                "Id"=>$_POST["editId"], 
                "IdSede"=>$_POST["editIdSede"],
                "IdPeriodo"=>$_POST["editIdPeriodo"],
                "Cargo"=>$_POST["editCargo"],
                "Funcion"=>$_POST["editFuncion"],
                "Estado"=>$_POST["editEstado"]    
            );
            
            $respuesta=ModeloAdministrativos::mdlEditar($arrayD);
            

            if($respuesta==="ok"){
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Actualizado",
                    text: "Se actualizo correctamente",
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