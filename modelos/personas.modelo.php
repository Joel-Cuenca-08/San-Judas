<?php
require_once "conexion.php";

class ModeloPersonas{
    /**Registrar Persona */
    static public function mdlRegistrarPersona($datos){

        $stmt = Conexion::conectar() -> prepare("INSERT INTO `persona`(Id, TipoDocumento, Nacionalidad, Nombre, ApellidoPa, ApellidoMa, Telefono, Correo, Direccion) VALUES 
        (:Id, :TipoDocumento, :Nacionalidad, :Nombre, :ApellidoPa, :ApellidoMa, :Telefono, :Correo, :Direccion)");

        $stmt -> bindParam(":Id", $datos["Id"], PDO::PARAM_STR);
        $stmt -> bindParam(":TipoDocumento", $datos["TipoDocumento"], PDO::PARAM_STR);
        $stmt -> bindParam(":Nacionalidad", $datos["Nacionalidad"], PDO::PARAM_STR);
        $stmt -> bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":ApellidoPa", $datos["ApellidoPa"], PDO::PARAM_STR);
        $stmt -> bindParam(":ApellidoMa", $datos["ApellidoMa"], PDO::PARAM_STR);
        $stmt -> bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
        $stmt -> bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
        $stmt -> bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error"; 
        }

        $stmt -> close();

        $stmt -> null;

    }

    /**Listar Persona**/
    static public function mdlListar(){
        
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM persona");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt -> null;
    }

    /**Borrar Persona**/
    static public function mdlBorrar($id){
        $stmt = Conexion::conectar()->prepare("DELETE FROM persona WHERE Id=:Id"); 
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


    static public function mdlEditar($datos){
        
        $stmt = Conexion::conectar()->prepare("UPDATE persona SET TipoDocumento=:TipoDocumento,
        Nacionalidad=:Nacionalidad, Nombre=:Nombre, ApellidoPa=:ApellidoPa, ApellidoMa=:ApellidoMa, Telefono=:Telefono,
        Correo=:Correo, Direccion=:Direccion WHERE Id=:Id");
        $stmt -> bindParam(":TipoDocumento",$datos["TipoDocumento"],PDO::PARAM_STR);
        $stmt -> bindParam(":Nacionalidad",$datos["Nacionalidad"],PDO::PARAM_STR);
        $stmt -> bindParam(":Nombre",$datos["Nombre"],PDO::PARAM_STR);
        $stmt -> bindParam(":ApellidoPa",$datos["ApellidoPa"],PDO::PARAM_STR);
        $stmt -> bindParam(":ApellidoMa",$datos["ApellidoMa"],PDO::PARAM_STR);
        $stmt -> bindParam(":Telefono",$datos["Telefono"],PDO::PARAM_STR);
        $stmt -> bindParam(":Correo",$datos["Correo"],PDO::PARAM_STR);
        $stmt -> bindParam(":Direccion",$datos["Direccion"],PDO::PARAM_STR);
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