<?php

class ControladorPropietario{

    /**Listar**/
    static public function ctrListar(){
        $Lista = ModeloPropietario::mdlListar();
        return $Lista;
    }

    /**Agregar**/
    static public function ctrAgrear(){
        if(isset($_POST["ingIdPersona"])){
            
            $arrayD = array(
                "IdPersona"=>$_POST["ingIdPersona"],
                "TarjetaPropiedad"=>$_POST["ingTarjetaPro"],
                "Ruc"=>$_POST["ingRuc"],
                "TelEmergencia"=>$_POST["ingTel"]   
            );
            $respuesta=ModeloPropietario::mdlAgregar($arrayD);
            if($respuesta==="ok"){
                echo '<script>
                swal({
                    icon: "success",
                    title: "Registrado",
                    text: "Se registro correctamente",
                    allowOutsideClick: false
                  }).then((result)=>{
                      if(result.value){
                        window.location="propietarios"; 
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

    /**Lista Persona no Inscrita**/
    static public function MdlListarPersonaNoInscrita(){
        $Lista = ModeloPropietario::MdlListarPersonaNoInscrita();
        return $Lista;
    } 

    /**Borrar Propietario**/
    static public function ctrBorrar(){
        if(isset($_POST["idBorrar"])){   
                $respuesta = ModeloPropietario::mdlBorrar($_POST["idBorrar"]);
                if($respuesta==="ok"){
                    echo '<script>
                    swal({
                        icon: "success",
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
                        icon: "error",
                        title: "No se pudo borrar"
                    });   
                    </script> 
                    ';
                } 
        }
    }





}