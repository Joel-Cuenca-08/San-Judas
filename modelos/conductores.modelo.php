<?php

require_once "Conexion.php";

class ModeloConductor{

    /**Listar Conductores**/
    static public function mdlListar(){
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM persona P inner join conductor C on C.IdPersona = P.Id");
        $stmt -> execute();
        return $stmt -> fetchAll(); 
        $stmt -> close();
        $stmt -> null;  
    }


    /**Agregar Conductor**/
    static public function mdlAgregar($datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO conductor( IdPersona, NroLicencia, CatLicencia) VALUES(:IdPersona, :NroLicencia, :CatLicencia)");
        $stmt -> bindParam(":IdPersona",$datos["IdPersona"],PDO::PARAM_STR);
        $stmt -> bindParam(":NroLicencia",$datos["NroLicencia"],PDO::PARAM_STR);
        $stmt -> bindParam(":CatLicencia",$datos["CatLicencia"],PDO::PARAM_STR);
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";                        
        }
        $stmt->close();
        $stmt=null;
    }

    /**Personas no inscritas en tabla conductor**/
    static public function MdlListarPersonaNoInscrita (){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM persona where Id NOT IN (select conductor.IdPersona from conductor)");        
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt -> null;
    } 


    /**Borrar Conductor**/
    static public function mdlBorrar($id){
        $stmt = Conexion::conectar()->prepare("DELETE FROM `conductor` WHERE Id=:Id"); 
        $stmt -> bindParam(":Id",$id,PDO::PARAM_STR);      
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