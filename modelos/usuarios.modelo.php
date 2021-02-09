<?php

require_once "conexion.php";

class ModeloUsuarios{
    /**MOSTRAR USUARIOS**/

    static public function MdlListar ($id){
        if($id==null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM persona P inner join usuarios U on U.IdPersona=P.Id");        
            $stmt -> execute();
            return $stmt -> fetchAll();       
        }else{       
            $stmt = Conexion::conectar()->prepare("SELECT IdPersona as IDPER, Id as ID, perfil as PERFIL FROM usuarios U  where U.Id=$id ");        
            $stmt -> execute();
            return $stmt -> fetch();  
        }
        $stmt -> close();
        $stmt -> null;
    }
    static public function mdlBorrar($id){
        $stmt = Conexion::conectar()->prepare("DELETE FROM `usuarios` WHERE Id=:Id"); 
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
    static public function MdlMostarUsuarios($usu, $pass){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM persona P inner join usuarios U on U.IdPersona=P.Id where U.usuario='$usu' and U.password ='$pass'");        
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();
        $stmt -> null;
    }
    static public function MdlListarPersona (){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM persona  where Id NOT IN (select usuarios.IdPersona from usuarios)");        
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt -> null;
    }
    static public function MdlAgregar($datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO `usuarios`( IdPersona, usuario, password, perfil) VALUES(:IdPersona, :usuario, :password, :perfil)");
        $stmt -> bindParam(":IdPersona",$datos["IdPersona"],PDO::PARAM_STR);
        $stmt -> bindParam(":usuario",$datos["usuario"],PDO::PARAM_STR);
        $stmt -> bindParam(":password",$datos["password"],PDO::PARAM_STR);
        $stmt -> bindParam(":perfil",$datos["perfil"],PDO::PARAM_STR);
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