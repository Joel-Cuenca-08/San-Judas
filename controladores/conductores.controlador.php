<?php

class ControladorConductor{

    /**Listar Conductor**/
    static public function ctrListar(){
        $Lista = ModeloConductor::mdlListar();
        return $Lista;
    }


    /**Agregar Condcutor**/
    static public function ctrAgrear(){
        if(isset($_POST["ingIdPersona"])){
            
            $arrayD = array(
                "IdPersona"=>$_POST["ingIdPersona"],
                "CatLicencia"=>$_POST["ingCatLicencia"],
                "NroLicencia"=>$_POST["ingNroLicencia"]
            );
            $respuesta=ModeloConductor::mdlAgregar($arrayD);
            if($respuesta==="ok"){
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Registrado",
                    text: "Se registro correctamente",
                    allowOutsideClick: false
                  }).then((result)=>{
                      if(result.value){
                        window.location="conductores"; 
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

    /**Borrar Conductor**/
    static public function ctrBorrar(){
        if(isset($_POST["idBorrar"])){   
                $respuesta = ModeloConductor::mdlBorrar($_POST["idBorrar"]);
                if($respuesta==="ok"){
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Borrado",
                        text: "Se borro correctamente",
                        allowOutsideClick: false
                    }).then((result)=>{
                        if(result.value){
                            window.location="conductores"; 
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

    /**Lista Persona no Inscrita**/
    static public function MdlListarPersonaNoInscrita(){
        $Lista = ModeloConductor::MdlListarPersonaNoInscrita();
        return $Lista;
    } 


    /**Editar Condcutor**/
    static public function ctrEditar(){
        if(isset($_POST["editId"])){
            
            $arrayD = array(
                "Id"=>$_POST["editId"], 
                "NroLicencia"=>$_POST["editLicencia"],
                "CatLicencia"=>$_POST["editCatLicencia"],
                "Estado"=>$_POST["editEstado"]  
            );
            $respuesta=ModeloConductor::mdlEditar($arrayD);
            
            if($respuesta==="ok"){
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Actualizado",
                    text: "Se actualizo correctamente",
                    allowOutsideClick: false
                  }).then((result)=>{
                      if(result.value){
                        window.location="conductores"; 
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

