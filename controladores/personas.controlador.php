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
                              "Id" => $_POST["nuevoNroDoc"],
                              "Nacionalidad" => $_POST["nuevoNacionalidad"],
                              "Correo" => $_POST["nuevoCorreo"],
                              "Direccion" => $_POST["nuevoDireccion"]); 
                $respuesta = ModeloPersonas::mdlRegistrarPersona($datos);
                if($respuesta == "ok"){                   
                    echo '<script>                
                    swal.fire({
                        type: "success",
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
                        type: "error",
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
                    Swal({
                        type: "success",
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
                    Swal({
                        type: "error",
                        title: "No se pudo borrar"
                    });   
                    </script> 
                    ';
                } 
        }
    }

    static public function ctrEditar(){
        
    }


}