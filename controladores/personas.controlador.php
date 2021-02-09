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
                           title: "¡La persona fue registrada correctamente!",
                           showConfirmButton: true,
                           confirmButtonText: "Cerrar",
                           closeOnConfirm: false
                       
                       }).then((result) => {
                           
                           if(result.values){
                               window.location = "personas";
                           }
   
                       });
   
                       
                   </script>';

                }

            }else{
   
                
                echo '<script>
                
                 swal({
                        
                        type: "error",
                        title: "¡Los campos no pueden ir vacios o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    
                    }).then((result) => {
                        
                        if(result.values){
                            window.location = "personas";
                        }

                    });

                    
                </script>';
            }
        }
    }
}