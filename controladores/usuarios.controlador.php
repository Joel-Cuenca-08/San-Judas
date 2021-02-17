<?php

class ControladorUsuarios{

    static public function ctrListar($id){
        $Lista = ModeloUsuarios::MdlListar($id);
        return $Lista;
    }
    static public function ctrAgrear(){
        if(isset($_POST["ingPass"])){
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
                Swal({
                    type: "success",
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
                Swal({
                    type: "error",
                    title: "error",
                    text: "No Se registro",
                    allowOutsideClick: false
                  });
                </script>';
            }
        }
    }
    static public function ctrEditar(){
        if(isset($_POST["editId"])){
            $respuesta=0;    
            if(strlen($_POST["editPass"])>0){           
                    //encryptacion de contraseña 
                    $encriptar = crypt($_POST["editPass"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');   
                    $arrayD = array(
                        "Id"=>$_POST["editId"], 
                        "usuario"=>$_POST["editUsuario"],
                        "password"=>$encriptar,
                        "perfil"=>$_POST["editPerfil"],
                        "estado"=>$_POST["editEstado"] 
                    );        
                    $respuesta=ModeloUsuarios::mdlEditar($arrayD);  
            }else{  
                $array2 = array(
                    "Id"=>$_POST["editId"], 
                    "usuario"=>$_POST["editUsuario"], 
                    "perfil"=>$_POST["editPerfil"],
                    "estado"=>$_POST["editEstado"] 
                );        
                $respuesta=ModeloUsuarios::MdlEditar2($array2); 
            } 
            if($respuesta==="ok"){
                echo '<script>
                Swal({
                    type: "success",
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
                Swal({
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
                $respuesta = ModeloUsuarios::mdlBorrar($_POST["idBorrar"]);
                if($respuesta==="ok"){
                    echo '<script>
                    Swal({
                        type: "success",
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
                    Swal({
                        type: "error",
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
                $respuesta = ModeloUsuarios::MdlMostarUsuarios($_POST["ingUsuario"]); 
                if($respuesta){
                        //encryptar contraseña 
                        $encriptar = crypt($_POST["ingPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    if($respuesta["password"]===$encriptar){
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
                }else{
                    echo '<br><div class="alert alert-danger">Usuario no encontrado</div>';
                }

            }

        }
    }
     static public function MdlListarPersonaNoInscrita(){
         $Lista = ModeloUsuarios::MdlListarPersonaNoInscrita();
         return $Lista;
     } 

    

}