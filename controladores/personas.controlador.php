<?php

class ControladorPersonas{

    /**Registrar Persona**/
    static public function ctrCrearPersonas(){

        if(isset($_POST["nuevoNombre"])){

            if(preg_match('/^[a-zA-Z]+$/',$_POST["nuevoNombre"]) && 
               preg_match('/^[a-zA-Z]+$/',$_POST["nuevoApellidoPa"]) &&
               preg_match('/^[a-zA-Z]+$/',$_POST["nuevoApellidoMa"]) &&
               preg_match('/^[0-9]+$/',$_POST["nuevoTelefono"]) &&
               preg_match('/^[0-9]+$/',$_POST["nuevoNroDoc"]) &&
               preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$_POST["nuevoCorreo"]) &&
               preg_match('/^[a-zA-Z]+$/',$_POST["nuevoNacionalidad"])){
                   

               $tabla = "persona";

               $datos = array("Nombre" => $_POST["nuevoNombre"],
                              "ApellidoPa" => $_POST["nuevoApellidoPa"],
                              "ApellidoMa" => $_POST["nuevoApellidoMa"],
                              "Telefono" => $_POST["nuevoTelefono"],
                              "TipoDocumento" => $_POST["ingTipoDocumento"],
                              "Id" => $_POST["nuevoNroDoc"],
                              "Nacionalidad" => $_POST["nuevoNacionalidad"],
                              "Correo" => $_POST["nuevoCorreo"],
                              "Direccion" => $_POST["nuevoDireccion"]);

                $respuesta = ModeloPersonas::mdlRegistrarPersona($tabla, $datos);

                if($respuesta == "ok"){
                   
                    echo '<script>
                
                    swal({
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

                }

            }else{
   
                
                echo '<script>
                
                 swal({      
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
                    swal({
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
                    swal({
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