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

    static public function mdlCrear($d1,$d2,$d3){
        $stmt = Conexion::conectar()->prepare("INSERT INTO `vehiculo`(IdPropietario, Placa, Tipo) VALUES ('$d1', '$d2', '$d3')");
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
        $stmt = Conexion::conectar() -> prepare("SELECT v.*,pe.Nombre, pe.ApellidoPa, pe.ApellidoMa, p.IdPersona as IdPersona FROM vehiculo v inner join propietario p on p.Id= v.IdPropietario  inner join persona pe on p.IdPersona = pe.Id");
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

    static public function mdlEditar($datos){
        $stmt = Conexion::conectar()->prepare("UPDATE vehiculo SET Placa=:Placa, Tipo=:Tipo, Estado=:Estado, WHERE Id=:Id");
        $stmt -> bindParam(":Placa",$datos["Placa"],PDO::PARAM_STR);
        
        $stmt -> bindParam(":Tipo",$datos["Tipo"],PDO::PARAM_STR);
        $stmt -> bindParam(":Estado",$datos["Estado"],PDO::PARAM_STR);
        $stmt -> bindValue(":Id",$datos["Id"],PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";                        
        }
        $stmt->close();
        $stmt=null;
        
    }


    static public function mdlEditarV($d1,$d4,$d5,$d6){
        $stmt = Conexion::conectar()->prepare("UPDATE `vehiculo` SET Placa='$d1',  Tipo='$d4', Estado='$d5' WHERE Id='$d6'");
        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        
        $stmt->close();
        $stmt=null;
        
        

        
    }

}