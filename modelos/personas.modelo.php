<?php
require_once "conexion.php";

class ModeloPersonas{

    static public function mdlRegistrarPersona($tabla, $datos){

        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(Id, TipoDocumento, Nacionalidad, Nombre, 
        ApellidoPa, ApellidoMa, Telefono, Correo, Direccion) VALUES (:Id, :TipoDocumento, :Nacionalidad, 
        :Nombre, :ApellidoPa, :ApellidoMa, :Telefono, :Correo, :Direccion)");

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
}