<?php

require_once "Conexion.php";


class ModeloRuta{

    static public function mdlAgregar($datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO `ruta`(IdConductor, IdAdministrativo, Fecha, Ganancia, Observacion) VALUES (:IdConductor, :IdAdministrativo, :Fecha, null, :Observacion)");
        $stmt -> bindParam(":IdConductor",$datos["IdConductor"],PDO::PARAM_STR);
        $stmt -> bindParam(":IdAdministrativo",$datos["IdAdministrativo"],PDO::PARAM_STR);
        $stmt -> bindParam(":Fecha",$datos["Fecha"],PDO::PARAM_STR);
        $stmt -> bindParam(":Observacion",$datos["Observacion"],PDO::PARAM_STR);
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";                        
        }
        $stmt->close();
        $stmt=null;
    }
    static public function mdlAgregarDetalle($datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO `detalle_ruta`(IdRuta, IdVehiculo, HoraSalida, HoraLlegada, Observacion) VALUES (:IdRuta, :IdVehiculo, :HoraSalida, null, null)");
        $stmt -> bindParam(":IdRuta",$datos["IdRuta"],PDO::PARAM_STR);
        $stmt -> bindParam(":IdVehiculo",$datos["IdVehiculo"],PDO::PARAM_STR);
        $stmt -> bindParam(":HoraSalida",$datos["HoraSalida"],PDO::PARAM_STR);
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";                        
        }
        $stmt->close();
        $stmt=null;
    }
    static public function mdlEditar(){

    }

    static public function mdlListar(){
        $stmt = Conexion::conectar() -> prepare("SELECT concat_ws(' ',p.Nombre,p.ApellidoPa,p.ApellidoMa) AS Conductor, v.Placa, r.Fecha, d.HoraSalida, d.HoraLlegada, r.Ganancia, r.Observacion as Vuelta, d.Observacion ,r.Id from vehiculo v 
        INNER JOIN detalle_ruta d ON d.IdVehiculo = v.Id
        INNER JOIN ruta r ON d.IdRuta = r.Id
        INNER JOIN conductor c ON r.IdConductor = c.Id
        INNER JOIN persona p ON c.IdPersona = p.Id");
            $stmt -> execute();
            return $stmt -> fetchAll(); 
            $stmt -> close();
            $stmt -> null;  
    }

    static public function mdlListarVehiculo(){
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM vehiculo");
        $stmt -> execute();
        return $stmt -> fetchAll(); 
        $stmt -> close();
        $stmt -> null;  
    }

    static public function mdlListarConductor(){
        $stmt = Conexion::conectar() -> prepare("SELECT c.Id, concat_ws(' ',p.Nombre,p.ApellidoPa,p.ApellidoMa) AS Conductor FROM persona p inner join conductor c on p.Id = c.IdPersona");
        $stmt -> execute();
        return $stmt -> fetchAll(); 
        $stmt -> close();
        $stmt -> null;  
    }

    
    static public function mdlListarAdministrativo(){
        $stmt = Conexion::conectar() -> prepare("SELECT a.Id, concat_ws(' ',p.Nombre,p.ApellidoPa,p.ApellidoMa) AS Administrativo FROM persona p inner join administrativo a on p.Id = a.IdPersona");
        $stmt -> execute();
        return $stmt -> fetchAll(); 
        $stmt -> close();
        $stmt -> null;  
    }

}