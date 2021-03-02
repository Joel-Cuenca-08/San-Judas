<?php 

require_once "../controladores/ruta.controlador.php"; 
 
require_once "../modelos/ruta.modelo.php"; 

class Ajaxruta{
    //Editar Administrativo
    public $idEditar;
    public function ajaxEditar(){ 
        $item=$this->idEditar;
        $respuesta=ControladorRuta::ctrBuscarRuta($item);
        echo json_encode($respuesta);
    } 

    
    public $idEditarListar;
    public function ajaxEditarListar(){ 
        $item=$this->idEditarListar;
        $respuesta=ControladorRuta::ctrBuscarRuta($item);
        echo json_encode($respuesta);
    } 
}

//Editar Administrativo
if(isset($_POST["idRuta"])){
    $editar=new Ajaxruta();
    $editar->idEditar = $_POST["idRuta"];
    $editar->ajaxEditar();
} 
//Editar Administrativo
if(isset($_POST["idRutaListar"])){
    $editar=new Ajaxruta();
    $editar->idEditarListar = $_POST["idRutaListar"];
    $editar->ajaxListar();
}   