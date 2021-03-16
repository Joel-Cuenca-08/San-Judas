<?php

class Conexion{

    private static $instance=null;
    
    private function __construct() {
        try {
            self::$instance = new PDO("mysql:host=brf3fruoqe1duf5mbdvb-mysql.services.clever-cloud.com:3306;dbname=brf3fruoqe1duf5mbdvb;charset=utf8", "uhculvvrdda6gdp6","6dv2wQfgS2Ipn3e4K8n5");
            //"mysql:host=localhost:3306;dbname=bdsanjudas;charset=utf8", "root",""
        } catch (PDOException $e) {
            echo "MySql Connection Error: " . $e->getMessage();
        }
    } 
    public static function conectar()  
    {        
        if(!isset(self::$instance)){ 
            new Conexion();
        }
        return self::$instance; 
    }  
    
}