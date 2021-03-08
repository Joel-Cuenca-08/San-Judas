<?php

require_once "conexion.php";

class ModeloUsuarios{
    /**MOSTRAR USUARIOS**/

    static public function MdlListar ($id){
        if($id==null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM persona P inner join usuario U on U.IdPersona=P.Id");        
            $stmt -> execute();
            return $stmt -> fetchAll();       
        }else{       
            $stmt = Conexion::conectar()->prepare("SELECT  `Id`, `IdPersona`, `Usuario`, `Password`, `Perfil`, `Estado` FROM usuarios where Id=$id ");        
            $stmt -> execute();
            return $stmt -> fetch();  
        }
        $stmt -> close();
        $stmt -> null;
    }
    static public function mdlBorrar($id){
        $stmt = Conexion::conectar()->prepare("DELETE FROM `usuario` WHERE Id=:Id"); 
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
    static public function MdlMostarUsuarios($usu){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM persona P inner join usuario U on U.IdPersona=P.Id where U.Usuario='$usu' and U.Estado = 1 ");        
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();
        $stmt -> null;
    }
    static public function MdlListarPersonaNoInscrita (){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM administrativo a INNER JOIN persona p ON a.IdPersona = p.Id  where a.IdPersona NOT IN (select usuario.IdPersona from usuario)");        
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt -> null;
    } 
    static public function MdlAgregar($datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO `usuario`( IdPersona, Usuario, Password, Perfil) VALUES(:IdPersona, :Usuario, :Password, :Perfil)");
        $stmt -> bindParam(":IdPersona",$datos["IdPersona"],PDO::PARAM_STR);
        $stmt -> bindParam(":Usuario",$datos["Usuario"],PDO::PARAM_STR);
        $stmt -> bindParam(":Password",$datos["Password"],PDO::PARAM_STR);
        $stmt -> bindParam(":Perfil",$datos["Perfil"],PDO::PARAM_STR);
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
        $stmt = Conexion::conectar()->prepare("UPDATE usuario SET Usuario=:Usuario,Perfil=:Perfil,Estado=:Estado,Password=:Password WHERE Id=:Id");  
        $stmt -> bindParam(":Usuario",$datos["Usuario"],PDO::PARAM_STR);
        $stmt -> bindParam(":Perfil",$datos["Perfil"],PDO::PARAM_STR);
        $stmt -> bindParam(":Estado",$datos["Estado"],PDO::PARAM_STR);
        $stmt -> bindParam(":Password",$datos["Password"],PDO::PARAM_STR);
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
    static public function mdlEditar2($datos){  
        $stmt = Conexion::conectar()->prepare("UPDATE usuario SET Usuario=:Usuario,Perfil=:Perfil,Estado=:Estado WHERE Id=:Id");  
        $stmt -> bindParam(":Usuario",$datos["Usuario"],PDO::PARAM_STR);
        $stmt -> bindParam(":Perfil",$datos["Perfil"],PDO::PARAM_STR);
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