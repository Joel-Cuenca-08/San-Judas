<?php
require_once "Conexion.php";

class ModeloAdministrativos{

    /**Listar Administrativos**/
    static public function mdlListar(){
    $stmt = Conexion::conectar() -> prepare("SELECT p.NumeroDoc, p.Nombre, p.ApellidoPa, p.ApellidoMa,p.Telefono, S.Sede, per.Nombre as periodo, per.Id, a.* FROM persona p inner join administrativo a on a.IdPersona= p.Id  inner join sede S on A.IdSede = S.Id inner join periodo per on a.IdPeriodo=per.Id");
        $stmt -> execute();
        return $stmt -> fetchAll(); 
        $stmt -> close();
        $stmt -> null;  
    }

    static public function mdlCrear($datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO administrativo( IdPersona, IdPeriodo, IdSede, Cargo, Funcion) VALUES(:IdPersona, :IdPeriodo, :IdSede, :Cargo, :Funcion)");
        $stmt -> bindParam(":IdPersona",$datos["IdPersona"],PDO::PARAM_STR);
        $stmt -> bindParam(":IdSede",$datos["IdSede"],PDO::PARAM_STR);
        $stmt -> bindParam(":IdPeriodo",$datos["IdPeriodo"],PDO::PARAM_STR);
        $stmt -> bindParam(":Cargo",$datos["Cargo"],PDO::PARAM_STR);
        $stmt -> bindParam(":Funcion",$datos["Funcion"],PDO::PARAM_STR);
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";                        
        }
        $stmt->close();
        $stmt=null;
    }

    static public function mdlBorrar($id){
        $stmt = Conexion::conectar()->prepare("DELETE FROM `administrativo` WHERE Id='$id' "); 
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";
        }
        $stmt->close();
        $stmt=null;

    }

    static public function mdlListarSede(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM sede");        
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt -> null;

    }

    /**Personas no inscritas en tabla conductor**/
    static public function MdlListarPersonaNoInscrita (){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM persona where Id NOT IN (select administrativo.IdPersona from administrativo)");        
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt -> null;
    }

    static public function mdlListarPeriodo(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM periodo");        
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt -> null;

    }

    static public function mdlEditar($datos){
        $stmt = Conexion::conectar()->prepare("UPDATE `administrativo` SET IdSede=:IdSede, IdPeriodo=:IdPeriodo, Cargo=:Cargo, Funcion=:Funcion, Estado=:Estado WHERE Id=:Id");  
        
        $stmt -> bindParam(":IdSede",$datos["IdSede"],PDO::PARAM_STR);
        $stmt -> bindParam(":IdPeriodo",$datos["IdPeriodo"],PDO::PARAM_STR);
        $stmt -> bindParam(":Cargo",$datos["Cargo"],PDO::PARAM_STR);
        $stmt -> bindParam(":Funcion",$datos["Funcion"],PDO::PARAM_STR);
        $stmt -> bindParam(":Estado",$datos["Estado"],PDO::PARAM_STR);
        $stmt -> bindParam(":Id",$datos["Id"],PDO::PARAM_STR);
        
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