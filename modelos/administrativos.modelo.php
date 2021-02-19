<?php
require_once "Conexion.php";

class ModeloAdministrativos{

    /**Listar Administrativos**/
    static public function mdlListar(){
    $stmt = Conexion::conectar() -> prepare("SELECT a.*, p.Nombre, p.ApellidoPa, p.ApellidoMa,p.Telefono, S.Sede, per.Nombre FROM persona p inner join administrativo a on a.IdPersona= p.Id  inner join sede S on A.IdSede = S.Id inner join periodo per on a.IdPeriodo=per.Id");
        $stmt -> execute();
        return $stmt -> fetchAll(); 
        $stmt -> close();
        $stmt -> null;  
    }

    static public function mdlCrear($datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO administrativo( IdPersona, IdSede, Cargo, Funcion) VALUES(:IdPersona, :IdSede, :Cargo, :Funcion)");
        $stmt -> bindParam(":IdPersona",$datos["IdPersona"],PDO::PARAM_STR);
        $stmt -> bindParam(":IdSede",$datos["IdSede"],PDO::PARAM_STR);
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
    


}