<?php

class ControladorUsuarios{

    static public function ctrListar($id){
        $Lista = ModeloUsuarios::MdlListar($id);
        return $Lista;
    }
    static public function ctrBorrar(){
        if(isset($_POST["idBorrar"])){   
                $respuesta = ModeloUsuarios::mdlBorrar($_POST["idBorrar"]);
                if($respuesta==="ok"){
                    echo '<script>
                    swal({
                        icon: "success",
                        title: "Borrado",
                        text: "Se borro correctamente",
                        allowOutsideClick: false
                    }).then((result)=>{
                        if(result.value){
                            window.location="usuarios"; 
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
    static public function ctrIngresarUsuario(){             
        if(isset($_POST["ingUsuario"])){
            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) && 
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){ 
                   //encryptar contraseña 
                $encriptar = crypt($_POST["ingPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $respuesta = ModeloUsuarios::MdlMostarUsuarios($_POST["ingUsuario"],$encriptar); 
                if($respuesta){
                    $_SESSION["iniciarSesion"] = "ok";
                    $_SESSION["ID_PERSONA"]=$respuesta["IdPersona"];
                    $_SESSION["NOMBRE"]=$respuesta["Nombre"];
                    $_SESSION["ROL"]=$respuesta["perfil"];
                    $_SESSION["APELLIDO"]=($respuesta["ApellidoPa"].' '.$respuesta["ApellidoMa"]);
                    echo '<script>
                        window.location = "inicio";
                    </script>';
                }else{
                    echo '<br><div class="alert alert-danger">Usuario o Contraseña incorrecta</div>';
                }

            }

        }
    }
    static public function ctrAgrear(){
        if(isset($_POST["ingIdPersona"])){
            //encryptacion de contraseña
            $encriptar = crypt($_POST["ingPass"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            $arrayD = array(
                "IdPersona"=>$_POST["ingIdPersona"],
                "usuario"=>$_POST["ingUsuario"],
                "perfil"=>$_POST["ingPerfil"],
                "password"=>$encriptar
            );
            $respuesta=ModeloUsuarios::MdlAgregar($arrayD);
            if($respuesta==="ok"){
                echo '<script>
                swal({
                    icon: "success",
                    title: "Registrado",
                    text: "Se registro correctamente",
                    allowOutsideClick: false
                  }).then((result)=>{
                      if(result.value){
                          window.location="usuarios";
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
     static public function ctrListarPersona(){
         $Lista = ModeloUsuarios::MdlListarPersona();
         return $Lista;
     }

    

}

