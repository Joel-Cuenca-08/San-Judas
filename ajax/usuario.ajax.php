<?php 

require_once "../controladores/usuarios.controlador.php"; 
 
require_once "../modelos/usuarios.modelo.php"; 

class AjaxUsuario{
    //Editar 
    public $idBuscar;
    public function ajaxBuscar(){
        $valor=$this->idBuscar;
        $respuesta=ControladorUsuarios::ctrListar($valor);
        echo $valor;
        echo json_encode($respuesta);
    } 
}


//Editar Usuario
if(isset($_POST["idEditar"])){
    $editar=new AjaxUsuario();
    $editar->idBuscar = $_POST["idEditar"];
    $editar->ajaxBuscar(); 
} 