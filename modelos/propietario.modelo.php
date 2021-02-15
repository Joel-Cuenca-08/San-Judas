<?php

require_once "Conexion.php";

class ModeloPropietario{

    
    /**Listar Propietarios**/
    static public function mdlListar(){
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM persona P inner join propietario O on O.IdPersona = P.Id");
        $stmt -> execute();
        return $stmt -> fetchAll(); 
        $stmt -> close();
        $stmt -> null;  
    }

    /**Personas no inscritas en tabla conductor**/
    static public function MdlListarPersonaNoInscrita (){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM persona where Id NOT IN (select propietario.IdPersona from propietario)");        
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt -> null;
    } 

    /**Agregar Propietario**/
    static public function mdlAgregar($datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO propietario( IdPersona, TarjetaPropiedad, Ruc, TelEmergencia) VALUES(:IdPersona, :TarjetaPropiedad, :Ruc, :TelEmergencia)");
        $stmt -> bindParam(":IdPersona",$datos["IdPersona"],PDO::PARAM_STR);
        $stmt -> bindParam(":TarjetaPropiedad",$datos["TarjetaPropiedad"],PDO::PARAM_STR);
        $stmt -> bindParam(":Ruc",$datos["Ruc"],PDO::PARAM_STR);
        $stmt -> bindParam(":TelEmergencia",$datos["TelEmergencia"],PDO::PARAM_STR);
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";                        
        }
        $stmt->close();
        $stmt=null;
    }


    /**Borrar Propietario**/
    static public function mdlBorrar($id){
        $stmt = Conexion::conectar()->prepare("DELETE FROM `propietario` WHERE Id=:Id"); 
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