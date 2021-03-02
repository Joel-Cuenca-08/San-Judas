<?php

require_once "Conexion.php";


class ModeloRuta{

    static public function mdlAgregar($datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO `ruta`(IdConductor, IdAdministrativo, IdVehiculo) VALUES (:IdConductor, :IdAdministrativo, :IdVehiculo)");
        $stmt -> bindParam(":IdConductor",$datos["IdConductor"],PDO::PARAM_STR);
        $stmt -> bindParam(":IdAdministrativo",$datos["IdAdministrativo"],PDO::PARAM_STR);
        $stmt -> bindParam(":IdVehiculo",$datos["IdVehiculo"],PDO::PARAM_STR);
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
        $stmt = Conexion::conectar()->prepare("INSERT INTO `detalle_ruta`(IdRuta, HoraSalida) VALUES (:IdRuta, :HoraSalida)");
        $stmt -> bindParam(":IdRuta",$datos["IdRuta"],PDO::PARAM_STR);
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
    static public function mdlAgregarDetalleLlegada($datos){
        $stmt = Conexion::conectar()->prepare("UPDATE `detalle_ruta` set HoraLlegada=:HoraLlegada WHERE Id=:Id ");
        $stmt -> bindParam(":Id",$datos["Id"],PDO::PARAM_STR);
        $stmt -> bindParam(":HoraLlegada",$datos["HoraLlegada"],PDO::PARAM_STR);
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
        /*$stmt = Conexion::conectar() -> prepare("SELECT concat_ws(' ',p.Nombre,p.ApellidoPa,p.ApellidoMa) AS Conductor, v.Placa, r.Fecha, r.Ganancia, r.Observacion as Vuelta, r.Id from vehiculo v 
        INNER JOIN ruta r ON v.Id = r.IdVehiculo
        INNER JOIN conductor c ON r.IdConductor = c.Id
        INNER JOIN persona p ON c.IdPersona = p.Id");*/
        $stmt = Conexion::conectar() -> prepare("SELECT r.Id, concat(p.ApellidoPa,' ',p.ApellidoMa,', ',p.Nombre) AS Conductor, v.Placa, r.Fecha, r.Ganancia, r.Observacion as Vuelta,GROUP_CONCAT(CONCAT('Salida : ',IFNULL(DR.HoraSalida,' sin registro '),' - Regreso : ',IFNULL(DR.HoraLlegada,' sin registro '))SEPARATOR ' \n / \n') as Detalle from ruta r INNER JOIN vehiculo v ON v.Id = r.IdVehiculo INNER JOIN conductor c ON r.IdConductor = c.Id INNER JOIN persona p ON c.IdPersona = p.Id left join detalle_ruta DR on DR.IdRuta=r.Id where DATE_FORMAT(Fecha, '%Y-%m-%d') = CURDATE() GROUP BY r.Id");
            $stmt -> execute();
            return $stmt -> fetchAll(); 
            $stmt -> close();
            $stmt -> null;  
    }
    
    static public function mdlBuscarRuta($id){
        $stmt = Conexion::conectar() -> prepare("SELECT DR.Id, r.Fecha,DR.HoraLlegada,DR.HoraSalida from detalle_ruta DR inner join ruta r on DR.IdRuta=r.Id where DATE_FORMAT(r.Fecha, '%Y-%m-%d') = CURDATE() and DR.IdRuta=$id ORDER by DR.Id DESC");
        $stmt -> execute();
        return $stmt -> fetch(); 
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
        $stmt = Conexion::conectar() -> prepare("SELECT a.Id,a.IdPersona, concat_ws(' ',p.Nombre,p.ApellidoPa,p.ApellidoMa) AS Administrativo, s.Sede FROM persona p inner join administrativo a on p.Id = a.IdPersona INNER JOIN sede s ON a.IdSede = s.Id");
        $stmt -> execute();
        return $stmt -> fetchAll(); 
        $stmt -> close();
        $stmt -> null;  
    }

    static public function mdlListarDetalleRuta($d1){
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM `detalle_ruta` WHERE Id='$d1'");
           
        $stmt -> execute();
        return $stmt -> fetchAll(); 
        $stmt -> close();
        $stmt -> null;  
    }

}