<?php

require_once "Conexion.php";


class ModeloVehiculo{

    static public function mdlAgregar(){

    }

    static public function mdlEditar(){

    }

    static public function mdlListar(){
        $stmt = Conexion::conectar() -> prepare("");
            $stmt -> execute();
            return $stmt -> fetchAll(); 
            $stmt -> close();
            $stmt -> null;  
    }


}