<?php

require_once "Conexion.php";


class ModeloVehiculo{

    static public function mdlListarPropietarios(){
        $stmt = Conexion::conectar()->prepare("SELECT p.*, e.* FROM propietario p inner join persona e on p.IdPersona = e.Id");        
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt -> null;
    }

    static public function mdlCrear($datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO vehiculo( Id, IdPropietario, Marca, Año, Tipo) VALUES(:Id, :IdPropietario, :Marca, :Año, :Tipo)");
        $stmt -> bindParam(":Id",$datos["Id"],PDO::PARAM_STR);
        $stmt -> bindParam(":IdPropietario",$datos["IdPropietario"],PDO::PARAM_STR);
        $stmt -> bindParam(":Marca",$datos["Marca"],PDO::PARAM_STR);
        $stmt -> bindParam(":Año",$datos["Año"],PDO::PARAM_STR);
        $stmt -> bindParam(":Tipo",$datos["Tipo"],PDO::PARAM_STR);
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
        $stmt = Conexion::conectar()->prepare("DELETE FROM vehiculo WHERE Id=:Id"); 
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