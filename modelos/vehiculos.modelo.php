<?php

require_once "Conexion.php";


class ModeloVehiculo{


    /**Personas no inscritas en tabla conductor**/
    static public function mdlListarPropetarios (){
        $stmt = Conexion::conectar()->prepare("SELECT P.Id,P.IdPersona,PE.Nombre,PE.ApellidoPa,PE.ApellidoMa from propietario P inner join persona PE on PE.Id=P.IdPersona");        
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt -> null;
    } 

    static public function mdlCrear($d1,$d2,$d3,$d4,$d5){
        $stmt = Conexion::conectar()->prepare("INSERT INTO `vehiculo`(Id, IdPropietario, Marca, Año, Tipo) VALUES ('$d1', $d2, '$d3', $d4, '$d5')");
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";                        
        }
        $stmt->close();
        $stmt=null;

    }


    static public function mdlListar(){
        $stmt = Conexion::conectar() -> prepare("SELECT v.*,pe.Nombre, pe.ApellidoPa, pe.ApellidoMa FROM vehiculo v inner join propietario p on p.Id= v.IdPropietario  inner join persona pe on p.IdPersona = pe.Id");
            $stmt -> execute();
            return $stmt -> fetchAll(); 
            $stmt -> close();
            $stmt -> null;  
    }


    static public function mdlBorrar($id){
        $stmt = Conexion::conectar()->prepare("DELETE FROM `vehiculo` WHERE Id='$id' "); 
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";
        }
        $stmt->close();
        $stmt=null;
    }

}