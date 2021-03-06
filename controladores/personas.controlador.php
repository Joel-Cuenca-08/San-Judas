<?php

class ControladorPersonas{

    /**Registrar Persona**/
    static public function ctrCrearPersonas(){

        if(isset($_POST["nuevoNombre"])){ 
               $datos = array("Nombre" => $_POST["nuevoNombre"],
                              "ApellidoPa" => $_POST["nuevoApellidoPa"],
                              "ApellidoMa" => $_POST["nuevoApellidoMa"],
                              "Telefono" => $_POST["nuevoTelefono"],
                              "TipoDocumento" => $_POST["ingTipoDocumento"],
                              "NumeroDoc" => $_POST["nuevoNroDoc"],
                              "Nacionalidad" => $_POST["nuevoNacionalidad"],
                              "Correo" => $_POST["nuevoCorreo"],
                              "Direccion" => $_POST["nuevoDireccion"]); 
                $respuesta = ModeloPersonas::mdlRegistrarPersona($datos);
                if($respuesta == "ok"){                   
                    echo '<script>                
                    swal.fire({
                        icon: "success",
                        title: "Registrado",
                        text: "Se registro correctamente",
                        allowOutsideClick: false
                      }).then((result)=>{
                          if(result.value){
                            window.location="personas"; 
                          }
                        });
                   </script>';
                }else{
                    echo '<script>                
                    swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "verifique datos ingresados",
                        allowOutsideClick: false
                      });
                   </script>';
                }

        }
    }

    /**Listar Persona**/

    static public function ctrListar(){
        $Lista = ModeloPersonas::mdlListar();
        return $Lista;
    }

    /**Borrar Persona**/
    static public function ctrBorrar(){
        if(isset($_POST["idBorrar"])){   
                $respuesta = ModeloPersonas::mdlBorrar($_POST["idBorrar"]);
                if($respuesta==="ok"){
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Borrado",
                        text: "Se borro correctamente",
                        allowOutsideClick: false
                    }).then((result)=>{
                        if(result.value){
                            window.location="personas"; 
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

    static public function ctrEditar(){
        if(isset($_POST["editId"])){
            
            $datos = array("Id" => $_POST["editId"],
                            "TipoDocumento"=> $_POST["editTipo"],
                           "Nombre" => $_POST["editNombre"],
                           "ApellidoPa" => $_POST["editApellidoPa"],
                           "ApellidoMa" => $_POST["editApellidoMa"],
                           "NumeroDoc" => $_POST["editnroDoc"],
                           "Telefono" => $_POST["editTelefono"],
                           "TipoDocumento" => $_POST["editTipo"],
                           "Nacionalidad" => $_POST["editNacionalidad"],
                           "Correo" => $_POST["editCorreo"],
                           "Direccion" => $_POST["editDireccion"]); 
            
            
            
            $respuesta=ModeloPersonas::mdlEditar($datos);  

            if($respuesta==="ok"){
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Actualizado",
                    text: "Se actualizo correctamente",
                    allowOutsideClick: false
                  }).then((result)=>{
                      if(result.value){
                        window.location="personas"; 
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